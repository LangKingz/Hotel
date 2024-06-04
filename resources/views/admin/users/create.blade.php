<x-app-layout>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('store')}}" method="POST">
                        @csrf
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
            
                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>
                        <div class="mt-4">
                            <x-label for="no_phone" value="{{ __('Phone Number') }}" />
                            <x-input id="no_phone" class="block mt-1 w-full" type="text" name="no_phone" :value="old('no_phone')" required autofocus autocomplete="no_phone" />
                        </div>
            
                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>
                        <div class="mt-4">
                            <x-label for='role' :value="__('Role')"/>
                            <select name="role" id="role" class="block mt-1 w-full">
                                <option value="customer">Customer</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>