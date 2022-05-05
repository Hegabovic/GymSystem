<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Training_session;
use Illuminate\Support\Facades\View;

class attendanceController extends Controller
{
    public function show(){
        $tableData=Attendance::withTrashed()->get();
        return view('attendance/show_attendance',['items'=>$tableData,'userData'=>request()->user()]);
    }

    public function create(){
        return view('attendance/create_attendance');
    }

    public function store(Request $request){
        $data=request()->all(); 
        $userData=$request->user();
        $attendance=Attendance::create(
            [
                'customer_id' =>$userData['id'],
                'gym_id' =>$data['gym_id'],
                'training_session_id' =>$data['training_session_name'],

            ]);
        return to_route('show.attendances');
    }
    public function restore()
    {
        $data=request()->input('id'); 
        $post = Attendance::withTrashed()->where('id', $data)->first();
        $post->restore();
        $post->save();
        return to_route('show.attendances');
    }
    public function delete()
    {
        $isDeleted=false;
        $data=request()->input('id'); 
        $record=Attendance::find($data);
        if($record)
        {
            $isDeleted=$record->delete();
        }
        if($isDeleted)
        {
            return ['success' =>'true'];
        }else{
            return ['success' =>'false'];
        }
    }
    public function edit($id)
    {
        $attendance=Attendance::All();
        $thisAttendance=Attendance::find($id);

       return view('attendance/editAttendance',['attendances'=>$attendance,'thisAttendance'=>$thisAttendance]);
    }

    public function update(Request $request, $attendance_id)
    {
        $attendance = Attendance::find($attendance_id);
        $training_session = Training_session::find($attendance_id);
        $attendance->update([
            "customer_id" => $request->user,
            "gym_id" => $request->gym,
            "training_session_id" => $request->training_session,
        ]);
        return to_route('show.attendances');
    }
}   
