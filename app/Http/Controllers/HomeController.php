<?php

namespace App\Http\Controllers;

use App\Repositories\AttendanceRepository;
use App\Repositories\CustomerRepository;
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
    private AttendanceRepository $attendanceRepository;
    private CustomerRepository $customerRepository;
    public function __construct(UserRepository $userRepository, OrderRepository $orderRepository, GymRepository $gymManagerRepository, AttendanceRepository $attendanceRepository, CustomerRepository $customerRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
        $this->gymRepository = $gymManagerRepository;
        $this->attendanceRepository = $attendanceRepository;
        $this->customerRepository = $customerRepository;
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
        $customersCount=0;
        $attendanceCount=0;
        $males=$this->customerRepository->all()->where('gender','male')->count();
        $females=$this->customerRepository->all()->where('gender','female')->count();
        if(Auth::user()->hasRole('Admin')) {
            $revenue = $this->orderRepository->all()->sum('paid_price');
            $ordersCount=$this->orderRepository->all()->count();
            $attendanceCount=$this->attendanceRepository->all()->count();

        }
        elseif (Auth::user()->hasRole('CityManager')){
            $gyms=$this->gymRepository->all()->where('city_id',Auth::user()->cityManager->city->id);
           foreach ($gyms as $gym)
           {

               $ordersCount+=$gym->order->count();
               $revenue+=$gym->order->sum('paid_price');
               $attendanceCount+=$gym->attendance->count();

           }

        }
        elseif (Auth::user()->hasRole('GymManager')) {
            $orders=$this->orderRepository->all()->where('gym_id', Auth::user()->gymManager->gym->id);
            $ordersCount=$orders->count();
            $revenue = $orders->sum('paid_price');
            $attendanceCount=$this->attendanceRepository->all()->where('gym_id', Auth::user()->gymManager->gym->id);

        }
        return view('home',[
            'revenue'=>$revenue,
            'orders'=>$ordersCount,
            'attendance'=>$attendanceCount,
            'males'=>$males,
            'females'=>$females

        ]);
    }
}
//Gym::with('city')->
