<x-app-layout>
    
 

    <x-slot name="header">
        @livewire('secbar')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Your post listing code goes here -->
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <x-application-logo class="block h-12 w-auto" />
                    </div>

                    <div class="mt-8 text-2xl">
                        Welcome to your Jetstream application!
                    </div>

                    <div class="mt-6 text-gray-500">
                        Laravel Jetstream is beautifully designed and built by Taylor Otwell and the Jetstream team. It provides a starting point for your next Laravel application and includes authentication, team management, API support via Laravel Sanctum, and more.
                    </div>
            </div>
        </div>
    </div>
    
</x-app-layout>