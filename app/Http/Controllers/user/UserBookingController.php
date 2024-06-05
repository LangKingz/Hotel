<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $bookings = Booking::with('room', 'user')
            ->where('user_id', $user->id)
            ->get();
        return view('user.bookings.index', compact('bookings'));
    }

    public function create($roomId)
    {
        $room = Room::findOrFail($roomId);
        return view('user.bookings.create', compact('room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        $room = Room::with('roomType')->findOrFail($request->room_id);
        $roomType = $room->roomType;

        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $totalDays = $checkIn->diffInDays($checkOut);

        $totalPrice = $roomType->price * $totalDays;

        $booking = Booking::create([
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $totalPrice,
        ]);

        $paymentDate = $request->check_in_date;

        Payment::create([
            'booking_id' => $booking->id,
            'amount' => $totalPrice, // Use total price as payment amount
            'payment' => $paymentDate
        ]);

        // Update room status to unavailable
        $room = Room::findOrFail($request->room_id);
        $room->availability_status = false; // Set to unavailable
        $room->save();

        return redirect()->route('show-user', ['booking' => $booking->id])->with('success', 'Booking successful.');
        // return redirect()->route('user-dashboard')->with('success', 'Booking successful.');
    }


    public function show($id)
    {
        // Mengambil booking dengan relasi payment
        $booking = Booking::with('payment')->findOrFail($id);

        return view('user.bookings.show', compact('booking'));
    }
}
