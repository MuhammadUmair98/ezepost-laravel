<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription as ModelsSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Stripe\Stripe;

class PlanController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptionItem = !empty(auth()->user()->subscription('default')) ? auth()->user()->subscription('default')->items->first() : '';

        $stripePrice = '';

        if (!empty($subscriptionItem))
            $stripePrice = $subscriptionItem->stripe_price;

        return inertia::render('customerViews/customerPricing', [
            'activePrice' => $stripePrice,
            'plans' => DB::table('plans')->where('type','personal')->get()->map(function ($plan) {
                return [
                    'id' => $plan->id,
                    'type' => $plan->type,
                    'name' => $plan->name,
                    'code' => $plan->code,
                    'price' => $plan->price,
                    'icon' => $plan->icon,
                    'slug' => $plan->slug,
                    'description' => $plan->description,
                    'stripe_plan' => $plan->stripe_plan,
                    'message' => $plan->message,
                    'options' => json_decode($plan->options, true),
                    'subscription_type' => $plan->subscription_type,
                ];
            }),
        ]);
    }
        /**
     * Display a Pricing Business
     */
    public function indexBusiness()
    {
        $subscriptionItem = !empty(auth()->user()->subscription('default')) ? auth()->user()->subscription('default')->items->first() : '';

        $stripePrice = '';

        if (!empty($subscriptionItem))
            $stripePrice = $subscriptionItem->stripe_price;

        return inertia::render('customerViews/customerPricingBusiness', [
            'activePrice' => $stripePrice,
            'plans' => DB::table('plans')->where('type','business')->get()->map(function ($plan) {
                return [
                    'id' => $plan->id,
                    'type' => $plan->type,
                    'name' => $plan->name,
                    'code' => $plan->code,
                    'price' => $plan->price,
                    'icon' => $plan->icon,
                    'slug' => $plan->slug,
                    'description' => $plan->description,
                    'stripe_plan' => $plan->stripe_plan,
                    'message' => $plan->message,
                    'options' => json_decode($plan->options, true),
                    'subscription_type' => $plan->subscription_type,

                ];
            }),
        ]);
    }


    /**
     * Stripe Payments 
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        $intent = [];
        $subscribe = false;

        $plan = DB::table('plans')->select('id', 'type', 'name', 'code', 'price', 'icon', 'slug', 'description', 'stripe_plan', 'message', 'options',)->where('slug', $slug)->first();
        if (empty($plan)) return to_route('pricing');

        if (auth()->check() === true) {
            $subscribe = auth()->user()->subscribed('default');

            if ($subscribe === false) {
                $intent = auth()->user()->createSetupIntent();
            }
        }

        return inertia::render('customerViews/customerCheckout', [
            'SKey' => env('STRIPE_KEY'),
            'intentToken' => $intent,
            'isUserSubscribe' => $subscribe,
            'plan' => [
                'id' => $plan->id,
                'type' => $plan->type,
                'name' => $plan->name,
                'code' => $plan->code,
                'price' => $plan->price,
                'icon' => $plan->icon,
                'slug' => $plan->slug,
                'description' => $plan->description,
                'message' => $plan->message,
                'options' => json_decode($plan->options, true),
                'stripePlan' => $plan->stripe_plan,
                
                
            ]
        ]);
    }

    /**
     * Linking to the Stripe (Creating Substription)
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $plan = DB::table('plans')->select('id', 'stripe_plan')->where('slug', $request->slug)->first();

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($request->payment);

            $user->newSubscription('default', $plan->stripe_plan)->create($request->payment);

            return response()->success([
                'data1' => '/customer/dashboard',
                'data2' => '/customer/dashboard',
                'data3' => '/customer/dashboard',
                'data4' => auth()->user()->subscribed('default')
            ]);
        } catch (IncompletePayment $exception) {
            return response()->success([
                'data1' => $exception->payment->id,
                'data2' => '/customer/dashboard',
                'data3' => $exception->payment->status,
                'data4' => ''
            ]);
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cancelSubscription(Request $request)
    {
        $request->validate(['plan' => 'required']);
        request()->user()->subscription('default', $request->stripePlan)->cancel();
        $subscription = ModelsSubscription::where('user_id', request()->user()->id)->first();
        $subscription_id = $subscription->id;
        $subscription->delete();
        DB::table('subscription_items')->where('subscription_id', $subscription_id)->delete();
        return Redirect::to('customer/dashboard');
        //
    }
}
