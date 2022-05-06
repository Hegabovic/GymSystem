<?php

namespace App\Http\Controllers;


use App\Contracts\ClerkRepositoryInterface;
use App\Repositories\UserRepository;
use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CustomerController extends Controller
{
    //
    private ClerkRepositoryInterface $customerRepository;
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository,ClerkRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->userRepository=$userRepository;
    }

    public function index(): Factory|View|Application
    {
        $customers = $this->customerRepository->all();
        return view('customers.index', ['customers' => $customers]);
    }

    public function create():Factory|View|Application{
        return view('customers.create');
    }
        public function store(StoreCustomerRequest $request): RedirectResponse
    {
        $avatarPath=env('DEFAULT_AVATAR');
        if($request->hasFile('avatar')){
            $avatarPath=$request->file('avatar')->store('public/photos');
        }
       $user= $this->userRepository->create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "avatar" => $avatarPath
           
           
        ]);
       
        $this->customerRepository->create([
            "user_id"=>$user->id,
            "birth_date" => $request->birth_date,
            "gender" => $request->gender,
            
           
        ]);
       
        return to_route('customers.index');
    }
    public function edit($customerId)
    {
        $selectedCustomer = $this->customerRepository->findById($customerId);
        return view('customers.edit', ['customer' => $selectedCustomer]);
    }
  

    public function update(StoreCustomerRequest $request)
    {
        
    }
    public function delete()
    {
       
    }
}
