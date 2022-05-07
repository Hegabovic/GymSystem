<?php

namespace App\Http\Controllers;
use App\Repositories\GymRepository;
use App\Repositories\OrderRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;

class orderController extends Controller
{
    private OrderRepository $orderRepository;
    private GymRepository $gymRepository;

    public function __construct(OrderRepository $orderRepository, GymRepository $gymRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->gymRepository = $gymRepository;

    }

    public function show(): Factory|View|Application
    {
//        $tableData = Order::withTrashed()->get();
        if(Auth::user()->hasRole('Admin'))
            $tableData=$this->orderRepository->all();
        elseif (Auth::user()->hasRole('CityManager')){
            $gyms=$this->gymRepository->all()->where('city_id',Auth::user()->cityManager->city->id);
            $tableData=new Collection();
            foreach ($gyms as $gym)
            {
                $tableData=$tableData->merge($gym->order);
            }
            // dd($gym->order->sum('paid_price'));
        }
        elseif (Auth::user()->hasRole('GymManager')) {
            $tableData = $this->orderRepository->all()->where('gym_id', Auth::user()->gymManager->gym->id);
        }

        return view('order.show', [
            'items' => $tableData,
            'userData' => request()->user()
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('order.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = request()->all();
        $userData = $request->user();
        $Orders = Order::create(
            [
                'customer_id' => $userData['customer_id'],
                'pkg_id' => $data['pkg_id'],
                'gym_id' => $data['gym_id'],
            ]);
        return to_route('show.attendances');
    }

    public function restore(int $orderID): RedirectResponse
    {
        $order = Order::withTrashed($orderID)->where('id', $orderID)->first();
        $order->restore();
        $order->save();
        return to_route('order.show');
    }

    public function delete()
    {
        $isDeleted = false;
        $data = request()->input('id');
        $record = Order::find($data);
        if ($record) {
            $isDeleted = $record->delete();
        }
        if ($isDeleted > 0) {
            return ['success' => true];
        } else {
            return ['success' => false, 'msg' => 'something went wrong!!'];
        }
    }
}
