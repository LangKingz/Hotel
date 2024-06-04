<x-app-layout>

    <x-slot name='header'>
        @livewire('secbar')
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
               
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="mb-4">
                            <ul class="list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('update-category',$category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="name" value="{{ __('Type Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="type_name" :value="old('type_name',$category->type_name)" required autofocus autocomplete="" />
                        </div>
            
                        <div class="mt-4">
                            <x-label for="description" value="{{ __('Description') }}" />
                            <textarea id="description" name="description" class="block mt-1 w-full" cols="100" rows="3">{{$category->description}}</textarea>
                        </div>
                        <div class="mt-4">
                            <x-label for="no_phone" value="{{ __('price') }}" />
                            <x-input id="price  " class="block mt-1 w-full" type="number" name="price"  :value="old('price',$category->price)" required autofocus autocomplete="no_phone" />
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