<style>

</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
       
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<x-app-layout>

    <x-slot name='header'>
        @livewire('secbar')
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800 leading-tight">Room Type</h1>
                    </div>
                    <div class="mt-6">
                        <a href="{{route('create-category')}}">
                            <button class="btn btn-primary">Add User</button>
                        </a>
                    </div>
                    <div class="mt-6">
                        <table class="table-auto w-full text-center">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">type</th>
                                    <th class="px-4 py-2">description</th>
                                    <th class="px-4 py-2">price</th>
                                    <th class="px-4 py-2">action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($posts as $post)
                                <tr>
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $post->type_name }}</td>
                                    <td class="px-4 py-2">{{ $post->description }}</td>
                                    <td class="px-4 py-2">{{ $post->price }}</td>
                                    <td class="px-4 py-2"><div class="dropdown">
                                        <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                         actions
                                        </button>
                                        <ul class="dropdown-menu">
                                          <form action="{{ route('delete-category', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <li><button class="dropdown-item" type="submit">Delete</button></li>
                                          </form>
                                          <li><a class="dropdown-item" href="{{route('edit-category',$post->id)}}">edit</a></li>
                                         
                                        </ul>
                                      </div></td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    
                
            </div>
        </div>
    </div>

</x-app-layout>