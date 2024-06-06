<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class userBytipe extends Controller
{
    public function showByType($roomType)
{
    // Mengambil tipe ruangan
    $roomType = RoomType::where('type_name', $roomType)->firstOrFail();

    // Mengambil semua ruangan dengan tipe tersebut beserta gambar (images)
    $rooms = Room::with('roomType', 'images')->where('room_type_id', $roomType->id)->get();

    return view('user.room.bytipe', compact('rooms', 'roomType'));
}

    public function index()
    {
        $roomTypes = RoomType::all();
        return view('user.room.reservasi', compact('roomTypes'));
    }
}
