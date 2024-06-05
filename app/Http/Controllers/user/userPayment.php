<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class userPayment extends Controller
{
    public function index()
    {
        $payments = Payment::with('booking.user', 'booking.room')->get(); // Assuming a Payment belongs to a Booking
        return view('user.payment.index', compact('payments'));
    }

    public function confirm($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'success';
        $payment->save();

        return redirect()->route('dashboard')->with('success', 'Payment confirmed successfully.');
    }

}
