<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="container">
        <h1>Booking Room: {{ $room->room_number }}</h1>
        <form wire:submit.prevent="book">
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" wire:model="start_date" required>
            </div>
    
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" wire:model="end_date" required>
            </div>
    
            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
    </div>
    
</div>
