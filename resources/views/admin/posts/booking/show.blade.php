<x-app-layout>
    <x-slot name='header'>
        @livewire('secbar')
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6">
                    <p>Room: {{ $booking->room->room_number }}</p>
                    <p>User: {{ $booking->user->name }}</p>
                    {{-- <p>Room Type: {{ $booking->roomType->type_name }}</p> --}}
                    <p>Check-in Date: {{ $booking->check_in_date }}</p>
                    <p>Check-out Date: {{ $booking->check_out_date }}</p>
                    <p>Total Price: {{ $booking->total_price }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>