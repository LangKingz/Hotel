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
            <a class="btn btn-primary mb-3" href="{{ route('create-payment') }}">Buat Booking Baru</a>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Booking ID</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->booking_id }}</td>
                                        <td>{{$payment->booking->user->name}}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->payment_date }}</td>
                                        <td>{{ $payment->status }}</td>
                                        <td>
                                            <a href="{{ route('edit-payment', $payment->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('delete-payment', $payment->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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