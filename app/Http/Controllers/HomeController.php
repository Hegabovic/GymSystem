<?php

namespace App\Http\Controllers;

use App\Repositories\GymManagerRepository;
use App\Repositories\GymRepository;
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
    private GymRepository $gymRepository;
    public function __construct(UserRepository $userRepository, OrderRepository $orderRepository, GymRepository $gymManagerRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
        $this->gymRepository = $gymManagerRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $revenue=0;
        $ordersCount=0;
        if(Auth::user()->hasRole('Admin')) {
            $revenue = $this->orderRepository->all()->sum('paid_price');
            $orders=$this->orderRepository->all()->count();
        }
        elseif (Auth::user()->hasRole('CityManager')){
            $gyms=$this->gymRepository->all()->where('city_id',Auth::user()->cityManager->id);
           foreach ($gyms as $gym)
           {

               $ordersCount+=$gym->order->count();
               $revenue+=$gym->order->sum('paid_price');

           }

        }
        elseif (Auth::user()->hasRole('GymManager')) {
            $orders=$this->orderRepository->all()->where('gym_id', Auth::user()->gymManager->gym->id);
            $ordersCount=$orders->count();
            $revenue = $orders->sum('paid_price');

        }
        return view('home',[
            'revenue'=>$revenue,
            'orders'=>$ordersCount
                                ]);
    }
}
//Gym::with('city')->
