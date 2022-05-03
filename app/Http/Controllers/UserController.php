<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClerkRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(StoreClerkRequest $request)
    {
        $input=request()->validated();
        $user=User::create([
            'name'=>$input['username'],
            'email'=>$input['email'],
            'password'=>Hash::make($input['password']),
        ]);
        if($request->clerk==='city-manager') $user->assignRole('CityManager');
        elseif ($request->clerk==='gym-manager') $user->assignRole('GymManager');
    }
    /*public function storeGymManager()
    {
        //
    }

    public function storeCityManager()
    {
        //
    }*/
    public function showUsers()
    {
        return view('users.show_users');
    }
    public function createCityManager()
    {
        return view('users.create_city_manager');
    }
    public function createGymManager()
    {
        return view('users.create_gym_manager');
    }
}
