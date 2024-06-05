<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomImage;
use App\Models\RoomType;
use Illuminate\Http\Request;

class roomController extends Controller
{

    // Category Controller
    public function index()
    {
        $posts = RoomType::all();
        return view('admin.posts.category.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $category = new RoomType();
        $category->type_name = $request->type_name;
        $category->description = $request->description;
        $category->price = $request->price;
        $category->save();

        return redirect()->route('category');
    }

    public function delete($id)
    {
        $category = RoomType::find($id);
        $category->delete();
        return redirect()->route('category');
    }

    public function edit($id)
    {
        $category = RoomType::find($id);
        return view('admin.posts.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = RoomType::find($id);
        $category->type_name = $request->type_name;
        $category->description = $request->description;
        $category->price = $request->price;
        $category->save();

        return redirect()->route('category');
    }




    // Room Controller
    public function indexRoom()
    {
        $rooms = Room::with('roomType', 'images')->get();
        return view('admin.posts.room.index', compact('rooms'));
    }

    public function createRoom()
    {
        $roomTypes = RoomType::all();
        return view('admin.posts.room.create', compact('roomTypes'));
    }

    public function storeRoom(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'room_type_id' => 'required',
            'availability_status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $room = Room::create($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = now()->timestamp . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);

                RoomImage::create([
                    'room_id' => $room->id,
                    'image_url' => $imageName
                ]);
            }
        }

        return redirect()->route('room')->with('success', 'Room created successfully.');
    }

    public function editRoom($id)
    {
        $room = Room::findOrFail($id);
        $roomTypes = RoomType::all();
        return view('admin.posts.room.edit', compact('room', 'roomTypes'));
    }

    public function updateRoom(Request $request, $id)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms,room_number,' . $id,
            'room_type_id' => 'required',
            'availability_status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->extension();
                $image->move(public_path('images'), $imageName);

                RoomImage::create([
                    'room_id' => $room->id,
                    'image_path' => $imageName
                ]);
            }
        }

        return redirect()->route('room')->with('success', 'Room updated successfully.');
    }

    public function deleteRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('room')->with('success', 'Room deleted successfully.');
    }
}
