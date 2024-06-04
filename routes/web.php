<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\postController;
use App\Http\Controllers\roomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
        
    // User Routes
    Route::middleware(['admin'])->group(function () {
        // Admin Routes
        Route::get('/dashboard', [homeController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/users', [homeController::class, 'users'])->name('users');
        Route::get('/dashboard/posts', [homeController::class, 'postsIndex'])->name('posts');

        // category routes
        Route::get('/dashboard/category',[roomController::class,'index'])->name('category');
        Route::get('/dashboard/category/create',[roomController::class,'create'])->name('create-category');
        Route::post('/dashboard/category',[roomController::class,'store'])->name('store-category');
        Route::get('/dashboard/category/{id}/edit',[roomController::class,'edit'])->name('edit-category');
        Route::put('/dashboard/category/{id}',[roomController::class,'update'])->name('update-category');
        Route::delete('/dashboard/category/{id}',[roomController::class,'delete'])->name('delete-category');
        
        Route::get('/room',[]);


        Route::get('/dashboard/posts/create', [postController::class, 'create'])->name('create');
        Route::post('/dashboard/posts/', [postController::class, 'store'])->name('store');
        Route::get('/dashboard/posts/{id}/edit', [postController::class, 'edit'])->name('edit');
        Route::put('/dashboard/posts/{id}', [postController::class, 'update'])->name('update');
        Route::delete('/dashboard/posts/{id}', [postController::class, 'destroy'])->name('delete');

        Route::get('/dashboard/users', [PostController::class, 'index'])->name('users');
    });
});
