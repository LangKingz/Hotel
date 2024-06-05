<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<x-app-layout>

    <x-slot name='header'>
        @livewire('secbar')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Your post listing code goes here -->
                <div class="p-6">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800 leading-tight">Room Type</h1>
                    </div>
                    <div class="mt-6">
                        <a href="{{route('create-room')}}">
                            <button class="btn btn-primary">Add</button>
                        </a>
                    </div>
                    <div class="mt-6">
                        @if ($rooms->isEmpty())
                        <p>No rooms found.</p>
                    @else
                        <table class="table w-full  text-center">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Room Number</th>
                                    <th class="px-4 py-2">Room Type</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Images</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td class="px-4 py-2">{{ $room->room_number }}</td>
                                        <td class="px-4 py-2">{{ $room->roomType->type_name }}</td>
                                        <td class="px-4 py-2">{{ $room->availability_status ? 'Available' : 'Unavailable' }}</td>
                                        <td class="px-4 py-2 flex gap-2">
                                            @foreach ($room->images as $image)
                                                <img src="{{ asset('images/' . $image->image_url) }}" alt="Room Image" width="30" height="30">
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-2">
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                  action
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a href="{{ route('edit-room', $room->id) }}" class="">Edit</a></li>
                                                  <li><form action="{{ route('delete-room', $room->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="">Delete</button>
                                                </form></li>
                                                
                                                </ul>
                                              </div>
                                            
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>