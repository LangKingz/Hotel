<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
       
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<x-app-layout>
    <x-slot name='header'>
        @livewire('secbar')
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Your post listing code goes here -->
                <div class="p-6">
                    <h1 class="mb-4">Daftar Booking</h1>
                <a class="btn btn-primary mb-3" href="{{ route('create-booking') }}">Buat Booking Baru</a>
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>type</th>
                            <th>Room</th>
                            <th>User</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Total price</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{$booking->room->roomType->type_name}}</td>
                                <td>{{ $booking->room->room_number }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->check_in_date }}</td>
                                <td>{{ $booking->check_out_date }}</td>
                                <td>{{ $booking->total_price }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>
                                    <a href="{{ route('show-booking', $booking->id) }}">Lihat</a>
                                    <a href="{{ route('edit-booking', $booking->id) }}">Edit</a>
                                    <form action="{{ route('delete-booking', $booking->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>