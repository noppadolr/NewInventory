<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Closure;

class AdminController extends Controller
{
    public function LoginView(){
        return view('admin.admin_login_view');

    }//End LoginView Method

    public function AdminDashboard(){
        return view('admin.dashboard');

    }
    //End AdminDashboard Method

    public function AdminProfile(){
        $id=Auth::user()->id;
        $adminData = User::find($id);
//        dd($adminData);
        return view('admin.admin_profile',compact('adminData'));
    }


    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address= $request->address;
        $data->updated_at = Carbon::now();
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/adminImages/' . $data->photo));
            //TODO อย่าลืมใส่ตรงนี้ทุกครั้ง
            $filename = $id . "_" . $file->getClientOriginalName();
            $file->move(public_path('upload/adminImages'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }
    //End StoreProfile method
    public function ChangePassword(){
        $id=Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.changepassword',compact('adminData'));
    } //End ChangePassword method

    public  function UpdatePassword(Request $request)
    {
        // validation
        $request->validate([
            'old_password' =>['required',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (!Hash::check($value,Auth::user()->password)) {
                        $fail("The Old Password is not Match !");
                    }
                },
            ],
            'new_password'=>'required|confirmed|min:3'

        ]);

        if (!Hash::check($request->old_password,Auth::user()->password)){
            $notification = array(
                'message' => 'Old Password Does not Match ! ',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        //Update The new password
        $id=Auth::user()->id;
        User::whereid(auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password),
        ]);
        $notification = array(
            'message' => 'Password Change Successfully Relogin! ',
            'alert-type' => 'success'
        );
//        return  redirect('admin/logout')->with($notification);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/admin/login/view')->with($notification);

    }//End UpdatePassword method

}
