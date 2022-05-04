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
        // Attendance::select([ 'training_session_id'])->count()->where('gym_id',$gymid);
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
}
