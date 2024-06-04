<div>
    <nav class="flex justify-center">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link href="{{ route('category') }}" :active="request()->routeIs('category')">
                {{ __('type') }}
            </x-nav-link>
            <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                {{ __('users') }}
            </x-nav-link>
            <x-nav-link href="{{ route('posts') }}" :active="request()->routeIs('posts')">
                {{ __('posts') }}
            </x-nav-link>
        </div>
    </nav>

</div>
