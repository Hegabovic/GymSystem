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

    public function store(Request $request){
        // get data from request
        // dd(request()->all());
        $data=request()->all(); 
        dd($request->user());
        // dd($user = auth()->user());
        //validate data
        $attendance=Attendance::create(
            [
                'user_id' =>$data['name'],
                'email' =>$data['email'],
                'training_session_name' =>$data['training_session_name'],
                // 'attendance_date' =>$data['created_at'],
                // 'attendance_time' =>$data['updated_at'],
            ]);
        //return to route show.attendances
        // return view('attendance/create_attendance');
        return to_route('show.attendances');
    }
}
