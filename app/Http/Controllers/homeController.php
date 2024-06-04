<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {

        $role = Auth()->user()->role;

        switch($role){
            case 'admin':
                return view('admin.index');
                break;
            case 'customer':
                return view('user.index');
                break;
            case 'staff':
                return view('staff.index');
                break;
            default:
                return view('user.index');
                break;
        }
    }

    public function users()
    {
        return view('admin.users.index');
    }

    public function postsIndex(){
        return view('admin.posts.index');
    }

}
