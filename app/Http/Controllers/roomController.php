<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class roomController extends Controller
{

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

    public function delete( $id){
        $category = RoomType::find($id);
        $category->delete();
        return redirect()->route('category');
    }

    public function edit($id){
        $category = RoomType::find($id);
        return view('admin.posts.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = RoomType::find($id);
        $category->type_name = $request->type_name;
        $category->description = $request->description;
        $category->price = $request->price;
        $category->save();

        return redirect()->route('category');
    }

    public function indexRoom(){
        return view('admin.posts.room.index');
    }
}
