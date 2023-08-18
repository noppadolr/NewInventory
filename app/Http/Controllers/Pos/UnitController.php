<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function UnitAll(){
        $units = Unit::query()->latest()->get();
//        dd($units);
        return view('backend.unit.unit_all',compact('units'));
    }//end method
}
