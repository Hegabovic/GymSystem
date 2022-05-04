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
   public function index()
   {
       return $this->userRepository->all();
   }

}
