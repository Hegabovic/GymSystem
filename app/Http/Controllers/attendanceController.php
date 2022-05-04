<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\View;

class attendanceController extends Controller
{
    public function show(){
        $tableData=Attendance::withTrashed()->get();
        return view('attendance/show_attendance',['items'=>$tableData,'userData'=>request()->user()]);
    }

    //incoming two methods should be in Api 
    public function create(){
        return view('attendance/create_attendance');
    }

    public function store(Request $request){
        $data=request()->all(); 
        // dd($data);
        $userData=$request->user();
        // dd($data['training_session_id']);
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

        // return ['success' =>'true'];
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
        $attendance=Attendance::find($id);
        //     $attendance_id=$attendance->id;
        //     $name=$attendance->customer->user->name;
        //     $email=$attendance->customer->user->email;
        //     $session_name=$attendance->training_session->name; 
        //     $gym_name=$attendance->gym->name;
        //     $city_name=$attendance->gym->city->name; 
            // return view('attendance/editAttendance',['attendance'=>$attendance]);
            return View::make('attendance/editAttendance')->with('attendance', $attendance); 
            // return redirect(route('edit.attendances'))->with('id', $attendance->id);
    }

    public function update(Request $request, $attendance_id)
    {
        $attendance = Attendance::find($attendance_id);

        $attendance->update([
            'name' => $request->cityName,
        ]);
        return to_route('show.attendances');
    }
}   
