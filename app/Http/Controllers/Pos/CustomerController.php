<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
  public function CustomerAll(){
      $customers = Customer::query()->latest()->get();
//       dd($data);
      return view('backend.customer.customer_all',compact('customers'));

  }   //end CustomerAll method
    public function CustomerAdd(){
      return view('backend.customer.customer_add');
    } //end CustomerAdd method

    public function CustomerStore(Request $request){
//        dd($request->all());
        $image = $request->file('customer_image');
        if($request->file('customer_image')){
            $file = $request->file('customer_image');
            @unlink( public_path($file));
        }
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
        $save_url = 'upload/customer/'.$name_gen;
        Customer::query()->insert([
            'name'=>$request->name,
            'customer_image'=>$save_url,
            'mobile_no'=>$request->mobile_no,
            'email'=>$request->email,
            'address'=>$request->address,
            'created_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),
            ]);
        $notification = array(
            'message' => 'Supplier Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification)->with('Inserted','Customer Inserted Successfully');
    }//end CustomerStore method

    public function CustomerEdit($id){
        $customers = Customer::query()->findOrFail($id);
        return view('backend.customer.customer_edit',compact('customers'));
    }//end method

    public function CustomerUpdate(Request $request) {
//      dd($request->all());
        $customer_id =$request->id;

        if($request->file('customer_image')){
            $imgfile =Customer::query()->find($customer_id);

            $file = $request->file('customer_image');
            $unlinkfile=$imgfile->customer_image;


            @unlink( public_path($unlinkfile));
            $name_gen ='customer_id_'.$customer_id.'_image.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(200,200)->save('upload/customer/'.$name_gen);
            $save_url = 'upload/customer/'.$name_gen;
            Customer::query()->findOrFail($customer_id)->update([
                'name'=>$request->name,
                'customer_image'=>$save_url,
                'mobile_no'=>$request->mobile_no,
                'email'=>$request->email,
                'address'=>$request->address,
                'updated_by'=>Auth::user()->id,
                'updated_at'=>Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Customer Update With Image Successfully',
                'alert-type' => 'success'
            );
//            return redirect()->route('customer.all')->with($notification)->with('swimage','Customer Update with Image Successfully');
            return redirect()->route('customer.all')->with('swimage','Customer Update with Image Successfully');

        } else
        {
            Customer::query()->findOrFail($customer_id)->update([
                'name'=>$request->name,

                'mobile_no'=>$request->mobile_no,
                'email'=>$request->email,
                'address'=>$request->address,
                'updated_by'=>Auth::user()->id,
                'updated_at'=>Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Customer Update Without Image Successfully',
                'alert-type' => 'success'
            );
//            return redirect()->route('customer.all')->with($notification);
            return redirect()->route('customer.all')->with('SwNoImage','Customer Update without Image Successfully');
        } //end else


    }

    public function CustomerDelete($id){
        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } //End method






}
