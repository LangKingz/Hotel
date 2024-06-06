<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class userPayment extends Controller
{
    // fungsi pembayaran untuk user
    public function index()
    {
        $payments = Payment::with('booking.user', 'booking.room')->get(); 
        return view('user.payment.index', compact('payments'));
    }



    public function confirm($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->is_paid = true;
        
        $payment->save();


        return redirect()->route('user-payment')->with('success', 'Payment confirmed successfully.');
    }

}
