<style>
    .btn{
        background-color: #426cac;
        border: none;
        color: white;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 10px
    
    }

    .btn-edit{
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 10px
    }

    .btn-delete{
        background-color: #f44336;
        border: none;
        color: white;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 10px
    }
</style>


<x-app-layout>

    <div class="p-12 mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 " style="margin-bottom: 2rem">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800 leading-tight">Users</h1>
                    </div>
                    <div class="mt-6">
                        <a href="{{route('create')}}">
                            <button class="btn">Add User</button>
                        </a>
                    </div>
                    <div class="mt-6">
                        <table class="table-auto w-full text-center">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Role</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php
                                    $nomor = 0;
                               @endphp
                                @foreach ($posts as $post)
                                    
                                    <tr>
                                        <td class=" px-4 py-2">{{++$nomor}}</td>
                                        <td class=" px-4 py-2">
                                            {{$post->id}}
                                        </td>
                                        <td class=" px-4 py-2">{{$post->name}}</td>
                                        <td class=" px-4 py-2">{{$post->email}}</td>
                                        <td class=" px-4 py-2">{{$post->role}}</td>
                                        <td class=" px-4 py-2">
                                            <a href="{{ route('edit', $post->id) }}">
                                                <button type="button" class="btn-edit">Edit</button>
                                            </a>
                                            <form action="{{ route('delete', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">Delete</button>
                                            </form>
                                        </td>
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