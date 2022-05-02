<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store()
    {
        $input=\request()->all();
        $user=User::create([
            'name'=>$input['username'],
            'email'=>$input['email'],
            'password'=>Hash::make($input['password']),
        ]);
        if($input['role']==='city-manager') $user->assignRole('CityManager');
        elseif ($input['role']==='gym-manager') $user->assignRole('GymManager');
    }

    public function showUsers()
    {
        return view('users.show_users');
    }
    public function createCustomer()
    {
        return view('users.create_customer');
    }
}
