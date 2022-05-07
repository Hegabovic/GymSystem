<?php

namespace App\Http\Controllers;


use App\Contracts\UserRepositoryInterface;
use App\Repositories\CustomerRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    //
    private UserRepository $userRepository;
    private CustomerRepository $customerRepository;
    public function __construct(CustomerRepository $customerRepository,UserRepository $userRepository)
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

    public function store(Request $request)
    {
        $avatarPath=env('DEFAULT_AVATAR');
        if($request->hasFile('avatar')){
            $avatarPath=$request->file('avatar')->store('public/photos');
        }
        
        $user=$this->userRepository->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'avatar_path'=>$avatarPath
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
