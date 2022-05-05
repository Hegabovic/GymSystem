<?php

namespace App\Http\Controllers;

use App\Contracts\PlanRepositoryInterface;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PlanController extends Controller
{
    private PlanRepositoryInterface $planRepository;

    public function __construct(PlanRepositoryInterface $planRepository)
    {
        $this->planRepository = $planRepository;
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
        $data =  $this->planRepository->all();
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
