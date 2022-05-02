<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class attendanceController extends Controller
{
    public function show(){
        $tableData=Attendance::all();
        return view('attendance/show_attendance',['items'=>$tableData]);
    }

    public function create(){
        return view('attendance/create_attendance');
    }
}
