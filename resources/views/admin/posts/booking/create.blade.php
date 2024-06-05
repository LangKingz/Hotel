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
                <h1 class="mb-3">Buat Booking Baru</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                         <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('store-booking') }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <label for="room_id">Room</label>
                        <select class="form-control" name="room_id" id="room_id">
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="mt-4">
                        <label for="room_id">status</label>
                        <select class="form-control" name="status" id="room_id">
                            
                                <option value="pending">pending</option>
                                <option value="approved">approved</option>
                                <option value="rejected">rejected</option>
                        
                        </select>
                    </div> --}}
                    <label for="room_type_id">Tipe Kamar:</label>
                        <select name="room_type_id" id="room_type_id">
                            @foreach($roomType as $roomTypes)
                                <option value="{{ $roomTypes->id }}">{{ $roomTypes->type_name }}</option>
                            @endforeach
                        </select>
                    <div class="mt-4">
                        <label for="room_id">User</label>
                        <select class="form-control" name="user_id" id="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ isset($booking) && $booking->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name}}
                                </option>
                            @endforeach
                        </select>
                    <div class="mt-4">
                        <label for="check_in_date">Tanggal Check-in:</label>
                         <input class="form-control" type="date" name="check_in_date" id="check_in_date" value="{{ isset($booking) ? $booking->check_in_date : '' }}">
                    </div>
                    <div class="mt-4">
                        <label for="check_out">Check-out</label>
                        <input class="form-control" type="date" name="check_out_date" id="check_out" value="{{ isset($booking) ? $booking->check_in_date : '' }}">
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>