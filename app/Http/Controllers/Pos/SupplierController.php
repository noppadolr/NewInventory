<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
   public function SupplierAll(){
       return view('supplier.supplier_all');

   }
   //end SupplierAll method
}
