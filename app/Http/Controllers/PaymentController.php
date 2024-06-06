<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('booking.user', 'booking.room')->get(); // Assuming a Payment belongs to a Booking
        return view('admin.posts.payment.index', compact('payments'));
    }

    public function create()
    {
        $bookings = Booking::all();
        $roomType = RoomType::all();
        $rooms = Room::all();
        $users = User::all()->where('role', 'customer');
        return view('admin.posts.payment.create', compact('bookings', 'rooms', 'users', 'roomType'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_date' => 'required|date',
            'is_paid' => 'required|',
        ]);

        // Mengambil data booking berdasarkan ID yang diberikan
        $booking = Booking::findOrFail($request->booking_id);

        // Mengambil nilai "price" dari booking dan menggunakan nilainya sebagai "amount" dalam pembayaran
        $total_price = $booking->total_price;
        $price_breakfast = $booking->breakfast_price;
        
        $amount =  $total_price + $price_breakfast;


        // Menyimpan data pembayaran ke dalam basis data
        $paymentData = [
            'booking_id' => $booking->id,
            'amount' => $amount,
            'payment_date' => $request->payment_date,
            'is_paid' => $request->is_paid,
        ];

        Payment::create($paymentData);


        return redirect()->route('payment')->with('success', 'Payment created successfully.');
    }

    public function show(Payment $payment)
    {
        return view('admin.posts.payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $bookings = Booking::all();
        $payment = Payment::findOrFail($id);
        return view('admin.posts.payment.edit', compact('payment', 'bookings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_date' => 'required|date',
            'is_paid' => 'required|boolean',
        ]);

        $payment = Payment::findOrFail($id);
        $booking = Booking::findOrFail($request->booking_id);

        // Mengambil nilai "total_price" dari booking dan menggunakan nilainya sebagai "amount" dalam pembayaran
        $amount = $booking->total_price;

        // Menyimpan data pembayaran ke dalam basis data
        $paymentData = [
            'booking_id' => $booking->id,
            'amount' => $amount,
            'payment_date' => $request->payment_date,
            'is_paid' => $request->is_paid,
        ];

        $payment->update($paymentData);

        return redirect()->route('payment')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payment')->with('success', 'Payment deleted successfully.');
    }
}
