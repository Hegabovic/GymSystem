<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class orderController extends Controller
{
    public function show(){
        $tableData=Order::all();
        return view('order/order',['table'=>$tableData]);
    }

    public function create(){
        return view('order/create_order');
    }
}
