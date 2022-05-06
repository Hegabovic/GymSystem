<?php

namespace App\Http\Controllers;

use App\Contracts\PlanRepositoryInterface;
use App\Models\Plan;
use App\Repositories\CustomerRepository;
use App\Repositories\GymRepository;
use App\Repositories\PackageRepository;
use App\Repositories\TrainingSessionsRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PlanController extends Controller
{
    private PlanRepositoryInterface $planRepository;
    private CustomerRepository $customerRepository;
    private TrainingSessionsRepository $trainingSessionsRepository;
    private GymRepository $gymRepository;


    public function __construct(PlanRepositoryInterface $planRepository,CustomerRepository $customerRepository,TrainingSessionsRepository $trainingSessionRepository,GymRepository $gymRepository)
    {

        $this->planRepository = $planRepository;
        $this->customerRepository = $customerRepository;
        $this->trainingSessionsRepository = $trainingSessionRepository;
        $this->gymRepository = $gymRepository;
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
        $customer =  $this->customerRepository->all();
        $trainingSession = $this->trainingSessionsRepository->all();
        $gym = $this->gymRepository->all();
        return view('plans.show_plan', [
            'plan' => $plan,
            'customer' => $customer,
            'trainingSession'=>$trainingSession,
            'gym' => $gym,
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
