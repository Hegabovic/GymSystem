<?php

namespace App\Http\Controllers;

use App\Contracts\OrderRepositoryInterface;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Session;
use Stripe;

class SubscriptionController extends Controller
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function create(Request $request)
    {
        $remaining_sessions = Order::find($request->package_id)->value("remaining_sessions");
        $order_cost = Package::select('price')->where('id', $request->package_id)->first()->price;

        $tableData = Order::withTrashed()->get();
        Stripe\Stripe::setApiKey(env("STRIPE_SECRET_KEY"));
        Stripe\Charge::create([
            "amount" => 100 * $order_cost,
            "currency" => "usd",
            "source" => $request->stripeToken,
        ]);
        Session::flash('success', 'Payment has been successfully processed.');

        $this->orderRepository->create([
            'customer_id' => $request['customer_id'],
            'pkg_id' => $request['package_id'],
            'gym_id' => $request['gym_id'],
            'remaining_sessions' => $remaining_sessions,
            'paid_price' => $order_cost,
        ]);

        return view("home");
    }


}
