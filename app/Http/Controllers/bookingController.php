<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
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
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        // Mengambil ruangan beserta tipe ruangan
        $room = Room::with('roomType')->findOrFail($request->room_id);
        $roomType = $room->roomType;

        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $totalDays = $checkIn->diffInDays($checkOut);

        // Menghitung total harga
        $totalPrice = $roomType->price * $totalDays;

        // Tambahkan harga sarapan jika dipilih
        $breakfastPrice = 0;
        if ($request->has('breakfast') && $request->breakfast) {
            $breakfastPrice = 80000; // Misalkan harga sarapan adalah 80,000 per hari
            $totalPrice += $breakfastPrice * $totalDays; // Perbaikan di sini
        }

        $booking = Booking::create([
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $totalPrice,
            'breakfast' => $request->breakfast ? true : false,
            'breakfast_price' => $breakfastPrice,
        ]);

        Payment::create([
            'booking_id' => $booking->id,
            'amount' => $totalPrice,
            'payment_date' => Carbon::now(),
        ]);

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
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'user_id' => 'required|exists:users,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'room_type_id' => 'required|exists:room_types,id',
        ]);

        $booking = Booking::findOrFail($id);
        $roomType = RoomType::findOrFail($request->room_type_id);
        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $totalDays = $checkIn->diffInDays($checkOut);

        $totalPrice = $roomType->price * $totalDays;

        // Tambahkan harga sarapan jika dipilih
        $breakfastPrice = 0;
        if ($request->has('breakfast') && $request->breakfast) {
            $breakfastPrice = 80000; // Misalkan harga sarapan adalah 50 per hari
            $totalPrice += $breakfastPrice * $totalDays;
        }

        $bookingData = $request->all();
        $bookingData['total_price'] = $totalPrice;
        $bookingData['breakfast'] = $request->breakfast ? true : false;
        $bookingData['breakfast_price'] = $breakfastPrice;

        $booking->update($bookingData);

        return redirect()->route('bookings')->with('success', 'Booking berhasil diupdate.');
    }

    // Menghapus booking dari database
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings')->with('success', 'Booking berhasil dihapus.');
    }
}
