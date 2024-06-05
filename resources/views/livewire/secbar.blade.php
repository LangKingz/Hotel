<div>
    <nav class="flex justify-center">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link href="{{ route('category') }}" :active="request()->routeIs('category')">
                {{ __('type') }}
            </x-nav-link>
            <x-nav-link href="{{ route('room') }}" :active="request()->routeIs('room')">
                {{ __('ruangan') }}
            </x-nav-link>
            <x-nav-link href="{{ route('bookings') }}" :active="request()->routeIs('bookings')">
                {{ __('booking') }}
            </x-nav-link>
            <x-nav-link href="{{ route('payment') }}" :active="request()->routeIs('payment')">
                {{ __('Payment') }}
            </x-nav-link>
        </div>
    </nav>

</div>
