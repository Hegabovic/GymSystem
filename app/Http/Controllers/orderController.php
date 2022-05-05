<?php

namespace App\Http\Controllers;


use http\Env\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\ArrayShape;

class orderController extends Controller
{

//    public function show(): Factory|View|Application
//    {
//        $orders = Order::all();
//        $gym = Gym::all();
//        $customer = Customer::all();
//        $users = User::all();
//        return view('order.show')->with(
//            [
//                'orders' => $orders,
//                'gyms' => $gym,
//                'customers' => $customer,
//                'users' => $users
//            ]);
//    }

    public function show(): Factory|View|Application
    {
        $tableData=Order::withTrashed()->get();
        return view('order.show',[
            'items'=>$tableData,
            'userData'=>request()->user()
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('order.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data=request()->all();
        $userData=$request->user();
        $Orders=Order::create(
            [
                'customer_id' =>$userData['customer_id'],
                'pkg_id' =>$data['pkg_id'],
                'gym_id' =>$data['gym_id'],
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

    public function delete(): array
    {
        $isDeleted=false;
        $data=request()->input('id');
        $record=Order::find($data);
        if($record)
        {
            $isDeleted=$record->delete();
        }
        if($isDeleted)
        {
            return ['success' =>'true'];
        }else{
            return ['success' =>'false'];
        }
    }
}
