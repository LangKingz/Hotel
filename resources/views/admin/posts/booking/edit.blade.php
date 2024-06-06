<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
       
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



<x-app-layout>
    <x-slot name='header'>
        @livewire('secbar')
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h1>Edit Booking</h1>
                <form action="{{ route('update-booking', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Room</label>
                        <select class="form-control" id="room_id" name="room_id" required>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" {{ $room->id == $booking->room_id ? 'selected' : '' }}>{{ $room->room_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $booking->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="room_type_id" class="form-label">Room Type</label>
                        <select class="form-control" id="room_type_id" name="room_type_id" required>
                            @foreach($roomTypes as $roomType)
                                <option value="{{ $roomType->id }}" {{ $roomType->id == $booking->room_type_id ? 'selected' : '' }}>{{ $roomType->type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="check_in_date" class="form-label">Check-in Date</label>
                        <input type="date" class="form-control" id="check_in_date" name="check_in_date" value="{{ $booking->check_in_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="check_out_date" class="form-label">Check-out Date</label>
                        <input type="date" class="form-control" id="check_out_date" name="check_out_date" value="{{ $booking->check_out_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="breakfast" class="form-label">Include Breakfast?</label>
                        <input type="checkbox" id="breakfast" name="breakfast" value="1" {{ $booking->breakfast ? 'checked' : '' }}>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Booking</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>