<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;

class PaymentMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(){
        return view('paymentmethods.create');
    }
    public function store(){
        $payment = new PaymentMethod();

        $payment->payment_method = request('paymentmethod');
        
        $payment->save();

        return redirect('/')->with('mssg','Payment Method has been added!');

    }
}
