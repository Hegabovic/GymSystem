<?php

namespace App\Http\Controllers;

use App\Contracts\OrderRepositoryInterface;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Stripe;
use Session;

class SubscriptionController extends Controller
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository){
    $this->orderRepository = $orderRepository;
}

    public function create(Request $request, Plan $plan): RedirectResponse
    {
        $plan = Plan::findOrFail($request->get('plan'));
        Stripe\Stripe::setApiKey(env("STRIPE_SECRET_KEY"));

        Stripe\Charge::create ([
            "amount" => 100 * 150,
            "currency" => "inr",
            "source" => $request->stripeToken,
        ]);
        Session::flash('success', 'Payment has been successfully processed.');

        $this->orderRepository->create([
            'customer_id' => $request['customer_id'],
            'pkg_id' => $request['training-session_id'],
            'gym_id' => $request['gym_id'],
        ]);

        return back();
    }


}
