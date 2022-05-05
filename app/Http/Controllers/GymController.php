<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\City;
use App\Models\Gym;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function show()
    {
        $gyms = Gym::all();
        return view('gyms.show', ['gyms' => $gyms]);
    }


    public function create () {

        $cities= City::All();

        return view  ('gyms.create',[
            'cities'=>$cities,

        ]);

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
     $gym=Gym::find($id);

    //  $gyms->name = $request->input('name');
    //  $gyms->created_at = $request->input('created at');
    //  $gyms->cover_image = $request->input('cover_image');


     return view('gyms.edit',['gym' => $gym]);
    }


    public function storeUpdate (Request $request,$gymId){

        $gym=Gym::find($gymId);
        $gym->update([
                          "name"=> $request["name"],
                          "created at"=>$request["created_at"],
                          "cover image"=>$request["cover_image"],

        ]);
        return to_route('show_gyms',['gym' => $gym]);

    }
    public function store(Request $request)
    {
        Gym::create([
            "name" => $request ['name'],
            "cover_image" => $request['cover_image'],
            "city_id" => $request ['city_id']
        ]);

        return to_route('show_gyms');
    }
}





