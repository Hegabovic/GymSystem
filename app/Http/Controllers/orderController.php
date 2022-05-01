<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class orderController extends Controller
{
    public function show(){
        $tableData=Order::all();
        return view('attendance/attendance',['table'=>$tableData]);
    }
}
