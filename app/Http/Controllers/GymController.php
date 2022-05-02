<?php

namespace App\Http\Controllers;
use App\Models\Gym;

use Illuminate\Http\Request;

class GymController extends Controller
{
    public function show()
    {


        $gymes= Gym::all();
        return view('layout.show_gym',['gymes'=>$gymes]);
    }
}







// $gymes= Gym::All();
        // return view('layout.AvailableGymes', [
        //         'gymes'=>$gymes,
        //     ]);

        //     // if($input['role']==='city-manager') $user->assignRole('CityManager');
        //     // elseif ($input['role']==='gym-manager') $user->assignRole('GymManager');
