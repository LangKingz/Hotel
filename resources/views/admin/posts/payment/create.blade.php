<x-app-layout>
    <x-slot name='header'>
        @livewire('secbar')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Your post listing code goes here -->
                <div class="p-6">
                    <h1 class="mb-3">Buat Payment</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                         <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('store-payment') }}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <label for="room_id">Room</label>
                        <select class="form-control" name="booking_id" id="room_id">
                            @foreach($bookings as $room)
                                <option value="{{ $room->id }}">{{ $room->id }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    {{-- <div class="form-group">
                        <label for="payment_date">status</label>
                        <select name="status" id="">
                            <option value="pending">Pending</option>
                            <option value="completed">Success</option>
                            <option value="cancelled">cancelled</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="status">payment date</label>
                        <input type="date" name="payment_date" id="payment_date" class="form-control" required>
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