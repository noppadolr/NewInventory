<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
   public function SupplierAll(){
       $suppliers = Supplier::query()->latest()->get();
//       dd($data);
       return view('backend.supplier.supplier_all',compact('suppliers'));

   }
   //end SupplierAll method

    public function SupplierAdd(){
       return view('backend.supplier.supplier_add');
    }
    //end SupplierAdd method

public function SupplierStore(Request $request){
//       dd($request->all());
    Supplier::insert([
        'name'=>$request->name,
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

    return redirect()->route('supplier.all')->with($notification);

}
//End method
    public function SupplierEdit($id){

        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit',compact('supplier'));

    } // End Method

    public function SupplierUpdate(Request $request){

        $sullier_id = $request->id;

        Supplier::findOrFail($sullier_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);

    } // End Method


    public function SupplierDelete($id){

        Supplier::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


} //End Class
