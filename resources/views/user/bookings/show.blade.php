<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
   
    @vite('resources/css/app.css')
    
    @livewireStyles
    @livewireScripts
</head>
<body>
    
    @livewire('navbar')
    <div class="p-12 mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800 leading-tight">Booking Details</h1>
                    </div>
                    <div class="mt-6">
                        <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
                        <p><strong>Customer Name:</strong> {{ $booking->user->name }}</p>
                        <p><strong>Booking Date:</strong> {{ $booking->check_in_date }}</p>
                        <p><strong>Booking Date:</strong> {{ $booking->check_in_out }}</p>
                        <p><strong>Total Amount:</strong> {{ $booking->total_price }}</p>

                        @if ($payment->status != 'success')
                            <form action="{{ route('confirm-payment', $payment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Confirm</button>
                            </form>
                        @else
                            <span class="badge bg-success">Success</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>