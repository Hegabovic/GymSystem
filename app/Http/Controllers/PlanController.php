<?php

namespace App\Http\Controllers;

use App\Contracts\PlanRepositoryInterface;
use App\Models\Plan;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PlanController extends Controller
{
    private PlanRepositoryInterface $planRepository;
    private CustomerRepository $customerRepository;

    public function __construct(PlanRepositoryInterface $planRepository,CustomerRepository $customerRepository)
    {
        $this->planRepository = $planRepository;
        $this->customerRepository = $customerRepository;
    }

    public function index(): Factory|View|Application
    {
        $plans = $this->planRepository->all();
        return view('plans.show', [
            'plans' => $plans,
        ]);
    }

    public function show(Plan $plan, Request $request): Factory|View|Application
    {
        $data =  $this->customerRepository->all();
        return view('plans.show_plan', [
            'plan' => $plan,
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {

        $this->planRepository->create([
            'name' => $request['cityName'],
            'slug' => $request['slug'],
            'stripe_plan' => $request['stripe_plan'],
            'cost' => $request['cost'],
        ]);
        return to_route('show_cities');
    }

}
