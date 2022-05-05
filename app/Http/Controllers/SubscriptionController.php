<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Stripe;
use Session;

class SubscriptionController extends Controller
{
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

        return back();
    }
}
