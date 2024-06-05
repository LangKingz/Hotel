<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
    @vite('resources/css/app.css')
    
    @livewireStyles
    @livewireScripts
</head>
<body>
    
    @livewire('navbar')

    <main>
        <div class="container">
            
                <@foreach ($payments as $payment)
                <p>{{$payment->id}}</p>
                <p>{{$payment->booking->user->name}}</p>
                <p>{{$payment->amount}}</p>
                <p>{{$payment->payment_date}}</p>
                <p>{{$payment->status}}</p>

                @if ($payment->status != 'success')
                            <form action="{{ route('confirm-payment', $payment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Confirm</button>
                            </form>
                    @else
                    <span class="badge bg-success">Success</span>
                 @endif
                @endforeach
            
        </div>
    </main>

</body>
</html>