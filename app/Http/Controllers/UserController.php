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
        $avatarPath=env('DEFAULT_AVATAR');
        if($request->hasFile('avatar')){
            $avatarPath=$request->file('avatar')->store('public/photos');
        }
        if($request->clerk === 'city-manager') {
            $user->assignRole('CityManager');

            $this->cityManagerRepository->create([
                'user_id'=>$user->id,
                'n_id'=>$input['n_id'],
                'avatar_path'=>$avatarPath,
                'city_id'=>$input['facility']
            ]);
        }
        elseif ($request->clerk==='gym-manager') {
            $user->assignRole('GymManager');
            $this->gymManagerRepository->create([
                'user_id'=>$user->id,
                'n_id'=>$input['n_id'],
                'avatar_path'=>$avatarPath,
                'gym_id'=>$input['facility']
            ]);
            }
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
    public function createGymManager(Request $request)
    {
        return view('users.create_gym_manager');
    }
    public function edit()
    {
        return view('users.edit_profile');
    }
    public function update(EditClerkRequest $request)
    {
        $input=$request->validated();
       //dd($input);
        if($request->hasFile('avatar'))
        {
            $avatarPath=$request->file('avatar')->store('public/photos');
            if($request->user()->hasrole('GymManager'))
            {
                $this->gymManagerRepository->updateavatar($request->user()->gymManager->id,$avatarPath);
            }
            if($request->user()->hasrole('CityManager'))
            {
                $this->cityManagerRepository->updateavatar($request->user()->cityManager->id,$avatarPath);
            }
        }
        if(isset($input['password'])) $input['password']=Hash::make($input['password']);
        $this->userRepository->update($request->user()->id,$input);
        return to_route('edit_profile');
    }
}
