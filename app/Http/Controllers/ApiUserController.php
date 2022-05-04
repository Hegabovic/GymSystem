<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRegisterRequest;
use App\Repositories\CityManagerRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\GymManagerRepository;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;


class ApiUserController extends Controller
{

    private UserRepository $userRepository;
    private CustomerRepository $customerRepository;

    public function __construct(UserRepository $userRepository,CustomerRepository $customerRepository)
    {

        $this->userRepository=$userRepository;
        $this->customerRepository=$customerRepository;
    }
    public function register(CustomerRegisterRequest $request)
    {
        $input=$request->validated();

        $user=$this->userRepository->create([
            'name'=>$input['name'],
            'email'=>$input['email'],
            'password'=>Hash::make($input['password']),
        ]);

        $avatarPath=$request->file('photo')->store('public/customers_avatars');

        $this->customerRepository->create([
            'user_id'=>$user->id,
            'avatar_path'=>$avatarPath,
            'gender'=>$input['gender'],
            'birth_date'=>$input['birth_date']
        ]);
        //event(new Registered($user));

        $token = $user->createToken('authtoken');

        return response()->json(
            [
                'message'=>'User Registered',
                'data'=> ['token' => $token->plainTextToken, 'user' => $user]
            ]
        );
    }
}
