<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Bookingform extends Component
{
    public $room;
    public $start_date;
    public $end_date;

    public function mount(Room $room)
    {
        $this->room = $room;
    }

    public function book()
    {
        $this->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $this->room->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', 'Booking successful.');

        return redirect()->route('rooms.index');
    }

    public function render()
    {
        return view('livewire.bookingform');
    }
}
