<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    public function index()
     {
         //
     }
 
     public function store(Request $request)
     {
         
         Stripe::setApiKey(env('STRIPE_SECRET'));
 
         $checkout_session = Session::create([
             'mode' => 'payment',
             'success_url' => route('checkout.success'),
             'cancel_url' => route('checkout.index'),
         ]);
 
         return redirect($checkout_session->url);
     }
 
     public function success()
     {
         return view('checkout.success');
     }
}
