<?php

namespace App\Http\Controllers;


use App\Contracts\ClerkRepositoryInterface;
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
  

}
