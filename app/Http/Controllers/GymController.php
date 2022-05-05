<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Gym;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function show()
    {
        $tableData=Gym::all();
        $gyms = Gym::all();
        return view('gyms.show_gym', ['gyms' => $gyms]);
    }

    public function delete()

    {
        $gymid=request()->input('id');
        $record=Gym::find($gymid);
        $NumberOfTrainingSession =Attendance::select([ 'training_session_id'])->where('gym_id',$gymid)->count();
        if ($record) {

            if ($NumberOfTrainingSession>0) {
                return ["success" => false , "messege"=>"there is a training session in the gym"];
            } else {

                $isDeleted=$record->delete();
                return ["success"=>true , "messege"=>"record has been deleted" ];
            }
        }
    }

    public function edit(Request $request,$id)
    {
     $gyms=Gym::find($id);
     $gyms->name = $request->input('name');
     $gyms->created_at = $request->input('created at');
     $gyms->cover_image = $request->input('cover_image');


     return to_route('show_gyms');
    }

}

