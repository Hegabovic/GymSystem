<?php

namespace App\Http\Controllers;


use App\Contracts\ClerkRepositoryInterface;
use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CustomerController extends Controller
{
    //
    private ClerkRepositoryInterface $customerRepository;

    public function __construct(ClerkRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
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
        $this->packageRepository->create([
            "birth_date" => $request->birth_date,
            "price" => $request->gender,
            "avatar_path" => $request->avatar_path,
            "user_id" => $request->user_id
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
        $formData = $request->all();
        $updatedCustomer= [
            "birth_date" => $formData["birth_data"],
            "gender" => $formData["gender"],
            "avatar_path" => $formData["number_of_sessions"],
            "user_id" => $formData["user_id"]
        ];
        $this->customerRepository->update($request->id, $updatedCustomer);

        return to_route('customers.index');
    }
    
}
