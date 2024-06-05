<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



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
                    <form action="{{ route('store-room') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="room_number" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="room_number" name="room_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="room_type_id" class="form-label">Room Type</label>
                            <select class="form-control" id="room_type_id" name="room_type_id" required>
                                @foreach($roomTypes as $roomType)
                                    <option value="{{ $roomType->id }}">{{ $roomType->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="availability_status" class="form-label">Availability Status</label>
                            <select class="form-control" id="availability_status" name="availability_status" required>
                                <option value="1">Available</option>
                                <option value="0">Unavailable</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Room</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>