<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
   public function SupplierAll(){
       $suppliers = Supplier::query()->latest()->get();
//       dd($data);
       return view('backend.supplier.supplier_all',compact('suppliers'));

   }
   //end SupplierAll method
}
