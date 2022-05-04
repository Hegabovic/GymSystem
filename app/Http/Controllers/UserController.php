<?php

namespace App\Http\Controllers;

use App\Contracts\BaseRepositoryInterface;
use App\Http\Requests\StoreClerkRequest;
use App\Models\User;
//use App\Repositories\BaseRepository;
use App\Repositories\CityManagerRepository;
use App\Repositories\GymManagerRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $user=$this->userRepository->create([
            'name'=>$input['name'],
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
        dd(\request()->user()->gymManager);
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
}
