


<x-app-layout>
    <x-slot name='header'>
        @livewire('secbar')
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="p-6">
                    <form action="{{route('store-category')}}" method="POST">
                        @csrf
                        <div>
                            <x-label for="name" value="{{ __('Type Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="type_name" :value="old('type_name')" required autofocus autocomplete="" />
                        </div>
            
                        <div class="mt-4">
                            <x-label for="description" value="{{ __('Description') }}" />
                            <textarea id="description" name="description" class="block mt-1 w-full" cols="100" rows="3"></textarea>
                        </div>
                        <div class="mt-4">
                            <x-label for="no_phone" value="{{ __('price') }}" />
                            <x-input id="price  " class="block mt-1 w-full" type="number" name="price"  :value="old('no_phone')" required autofocus autocomplete="no_phone" />
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