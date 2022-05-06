<?php

namespace App\Http\Controllers;

use App\Contracts\BaseRepositoryInterface;
use App\Http\Requests\EditClerkRequest;
use App\Http\Requests\StoreClerkRequest;
use App\Models\User;
use App\Repositories\CityManagerRepository;
use App\Repositories\GymManagerRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private GymManagerRepository $gymManagerRepository;
    private CityManagerRepository $cityManagerRepository;
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository,GymManagerRepository $gymManagerRepository,CityManagerRepository $cityManagerRepository)
    {
        $this->cityManagerRepository=$cityManagerRepository;
        $this->gymManagerRepository=$gymManagerRepository;
        $this->userRepository=$userRepository;
    }
    public function store(StoreClerkRequest $request)
    {
        $input=$request->validated();
        $avatarPath=env('DEFAULT_AVATAR');
        if($request->hasFile('avatar')){
            $avatarPath=$request->file('avatar')->store('public/photos');
        }
        $userid=$this->userRepository->create([
            'name'=>$input['name'],
            'email'=>$input['email'],
            'password'=>Hash::make($input['password']),
            'avatar_path'=>$avatarPath
        ]);

        $user=$this->userRepository->findById($userid);

        if($request->clerk === 'city-manager') {
            $user->assignRole('CityManager');

            $this->cityManagerRepository->create([
                'user_id'=>$user->id,
                'n_id'=>$input['n_id'],
                'city_id'=>$input['facility']
            ]);
        }
        elseif ($request->clerk==='gym-manager') {
            $user->assignRole('GymManager');
            $this->gymManagerRepository->create([
                'user_id'=>$user->id,
                'n_id'=>$input['n_id'],
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
    public function createGymManager()
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
           /* if($request->user()->hasrole('GymManager'))
            {
                $this->gymManagerRepository->updateavatar($request->user()->gymManager->id,$avatarPath);
            }
            if($request->user()->hasrole('CityManager'))
            {
                $this->cityManagerRepository->updateavatar($request->user()->cityManager->id,$avatarPath);
            }*/
            $this->userRepository->updateAvatar($request->user()->id,$avatarPath);
        }
        if(isset($input['password'])) $input['password']=Hash::make($input['password']);
        $this->userRepository->update($request->user()->id,$input);
        return to_route('edit_profile');
    }
}
