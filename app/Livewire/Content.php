<?php

namespace App\Livewire;

use App\Models\Room;
use App\Models\RoomType;
use Livewire\Component;

class Content extends Component
{
    public $rooms;

    public function mount(){
        $this->rooms = Room::with('roomType', 'images')->where('availability_status', true)->get();

    }
    public function render()
    {
        return view('livewire.content');
    }
}
