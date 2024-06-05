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
</head>
<body>

    @livewire('navbar')

    <main>
        <div class="container">
            <h1>Booking Room: {{ $room->room_number }}</h1>
            <form action="{{ route('store-user-booking') }}" method="POST">
                @csrf
                <label for="">user id</label>
                <input type="text" name="user_id" value="{{ auth()->user()->id }}">

                <label for="">room id</label>
                <input type="text" name="room_id" value="{{ $room->id }}">
        
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="check_in_date" required>
                </div>
        
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="check_out_date" required>
                </div>
        
                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
        </div>
    </main>
    
</body>
</html>