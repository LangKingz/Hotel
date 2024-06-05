<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Menampilkan daftar booking
    public function index()
    {
        $bookings = Booking::with('room.roomType', 'user')->get(); // Misal relasi booking dengan room dan user
        return view('admin.posts.booking.index', compact('bookings'));
    }

    // Menampilkan form untuk membuat booking baru
    public function create()
    {
        $roomType = RoomType::all();
        $rooms = Room::all();
        $users = User::all()->where('role', 'customer');
        return view('admin.posts.booking.create', compact('rooms', 'users', 'roomType'));
    }

    // Menyimpan booking baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'room_type_id' => 'required|exists:room_types,id',
            // 'status' => 'required|in:pending,approved,rejected',
        ]);

        $roomType = RoomType::findOrFail($request->room_type_id);
        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $totalDays = $checkIn->diffInDays($checkOut);

        $totalPrice = $roomType->price * $totalDays;

        $bookingData = $request->all();
        $bookingData['total_price'] = $totalPrice;

        Booking::create($bookingData);

        return redirect()->route('bookings')->with('success', 'Booking berhasil dibuat.');
    }

    // Menampilkan detail booking
    public function show(Booking $booking)
    {
        $booking->load('roomType');
        return view('admin.posts.booking.show', compact('booking'));
    }

    // Menampilkan form untuk mengedit booking
    public function edit(Booking $booking)
    {
        $roomTypes = RoomType::all();
        $rooms = Room::all();
        $users = User::where('role', 'customer')->get();
        return view('admin.posts.booking.edit', compact('booking', 'rooms', 'users', 'roomTypes'));
    }

    // Mengupdate booking di database
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'room_type_id' => 'required|exists:room_types,id',
        ]);

        $roomType = RoomType::findOrFail($request->room_type_id);
        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $totalDays = $checkIn->diffInDays($checkOut);

        $bookingData = $request->all();
        $bookingData['total_price'] = $roomType->price * $totalDays;

        $booking->update($bookingData);

        // Update room status if room_id is changed
        if ($booking->isDirty('room_id')) {
            $oldRoom = Room::findOrFail($booking->getOriginal('room_id'));
            $oldRoom->availability_status = true;
            $oldRoom->save();

            $newRoom = Room::findOrFail($request->room_id);
            $newRoom->availability_status = false;
            $newRoom->save();
        }

        return redirect()->route('bookings')->with('success', 'Booking berhasil diupdate.');
    }

    // Menghapus booking dari database
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings')->with('success', 'Booking berhasil dihapus.');
    }
}
