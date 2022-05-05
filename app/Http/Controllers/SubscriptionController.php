<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{
    public function create(Request $request, Plan $plan): RedirectResponse
    {
        $plan = Plan::findOrFail($request->get('plan'));

        $request->user()
            ->newSubscription('main', $plan->stripe_plan)
            ->create($request->stripeToken);

        return redirect()->route('home')->with('success', 'Your plan subscribed successfully');
    }
}
