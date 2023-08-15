<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;


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
}
