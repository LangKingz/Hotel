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

    <main>
        <div class="container">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Room</th>
                        <th>User</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Total price</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->room->room_number }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->check_in_date }}</td>
                            <td>{{ $booking->check_out_date }}</td>
                            <td>{{ $booking->total_price }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>