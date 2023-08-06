<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use Closure;

class AuthController extends Controller
{
    public function AdminLogin(Request $request){
        $user = $request->username;
        $request->validate([
            'username'=>['required',
                function (string $attribute, mixed $value, Closure $fail){
                    if(!$value= User::where('username',"=",$value)->first()){
                        $fail("This username isn't available. please try another. !");
                    }

                }

            ],
            'password'=>['required',]
        ]);

        $user = User::where('username',"=",$request->username)->first();
        if($user) {
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                Auth::login($user);
                $url = '';
                if($request->user()->role === 'admin'){
                    $url='/admin/dashboard';
                } elseif ($request->user()->role === 'agent'){
                    $url='/agent/dashboard';
                } elseif($request->user()->role === 'user'){
                    $url='/dashboard';

                }
                if(Auth::check()){
                    return redirect()->intended($url);
                }
            }else{

                return back()->with('pfail','Password not match!')->with('username',$request->username);
            }
        }
        else
        {
            return back()->with('efail','Username '.$request->username.' is not Register');

        }

    }//End Method

    public function  UserLogout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login.view');

    }
    //End AdminLogout Method
}
