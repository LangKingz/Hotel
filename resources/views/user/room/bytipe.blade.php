<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

            {{-- bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

            <!-- Styles -->
            @vite('resources/css/app.css')
           @livewireStyles
           @livewireScripts
</head>
<body>
    
    @livewire('navbar')

    <div class="container">
        <h1 class="mt-5">Rooms of Type: {{ $roomType->type_name }}</h1>
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($room->images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{asset('images/'.$image->image_url)}}" class="d-block w-20" alt="..." width="20" height="20">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <h5 class="card-title">Room Number: {{ $room->room_number }}</h5>
                            <p class="card-text">Price per Night: {{ $room->roomType->price }}</p>
                            <p class="card-text">Description: {{ $room->roomType->description }}</p>
                            <a href="{{ route('user-booking', $room->id) }}" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>