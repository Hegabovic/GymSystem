<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private UserRepository $userRepository;
    private OrderRepository $orderRepository;
    public function __construct(UserRepository $userRepository, OrderRepository $orderRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        if(Auth::user()->hasRole('Admin'))
            $revenue=$this->orderRepository->all()->sum('paid_price');
        elseif (Auth::user()->hasRole('CityManager'))
            $revenue=$this->orderRepository->join();
        return view('home',['revenue'=>$revenue]);
    }
}
