<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\postController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\user\UserBookingController as UserUserBookingController;
use App\Http\Controllers\user\userPayment;
// use App\Http\Controllers\UserBookingController;
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



    Route::middleware(['admin'])->group(function () {
        // Admin Routes
        Route::get('/dashboard', [homeController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/users', [homeController::class, 'users'])->name('users');
        Route::get('/dashboard/posts', [homeController::class, 'postsIndex'])->name('posts');

        // category routes
        Route::get('/dashboard/category', [roomController::class, 'index'])->name('category');
        Route::get('/dashboard/category/create', [roomController::class, 'create'])->name('create-category');
        Route::post('/dashboard/category', [roomController::class, 'store'])->name('store-category');
        Route::get('/dashboard/category/{id}/edit', [roomController::class, 'edit'])->name('edit-category');
        Route::put('/dashboard/category/{id}', [roomController::class, 'update'])->name('update-category');
        Route::delete('/dashboard/category/{id}', [roomController::class, 'delete'])->name('delete-category');

        // room routes
        Route::get('/room', [roomController::class, 'indexRoom'])->name('room');
        Route::get('/room/create', [roomController::class, 'createRoom'])->name('create-room');
        Route::post('/room', [roomController::class, 'storeRoom'])->name('store-room');
        Route::get('/room/{id}/edit', [roomController::class, 'editRoom'])->name('edit-room');
        Route::put('/room/{id}', [roomController::class, 'updateRoom'])->name('update-room');
        Route::delete('/room/{id}', [roomController::class, 'deleteRoom'])->name('delete-room');

        // post routes
        Route::get('/dashboard/posts/create', [postController::class, 'create'])->name('create');
        Route::post('/dashboard/posts/', [postController::class, 'store'])->name('store');
        Route::get('/dashboard/posts/{id}/edit', [postController::class, 'edit'])->name('edit');
        Route::put('/dashboard/posts/{id}', [postController::class, 'update'])->name('update');
        Route::delete('/dashboard/posts/{id}', [postController::class, 'destroy'])->name('delete');
        Route::get('/dashboard/users', [PostController::class, 'index'])->name('users');

        // booking routes
        Route::get('/dashboard/booking', [BookingController::class, 'index'])->name('bookings');
        Route::get('/dashboard/booking/create', [BookingController::class, 'create'])->name('create-booking');
        Route::post('/dashboard/booking', [BookingController::class, 'store'])->name('store-booking');
        Route::get('/dashboard/booking/{booking}/edit', [BookingController::class, 'edit'])->name('edit-booking');
        Route::put('/dashboard/booking/{booking}', [BookingController::class, 'update'])->name('update-booking');
        Route::delete('/dashboard/booking/{booking}', [BookingController::class, 'destroy'])->name('delete-booking');
        Route::get('/dashboard/booking/{booking}', [BookingController::class, 'show'])->name('show-booking');

        // payment routes
        Route::get('/dashboard/payment', [PaymentController::class, 'index'])->name('payment');
        Route::get('/dashboard/payment/create', [PaymentController::class, 'create'])->name('create-payment');
        Route::post('/dashboard/payment', [PaymentController::class, 'store'])->name('store-payment');
        Route::get('/dashboard/payment/{payment}/edit', [PaymentController::class, 'edit'])->name('edit-payment');
        Route::put('/dashboard/payment/{payment}', [PaymentController::class, 'update'])->name('update-payment');
        Route::delete('/dashboard/payment/{payment}', [PaymentController::class, 'destroy'])->name('delete-payment');
        Route::get('/dashboard/payment/{payment}', [PaymentController::class, 'show'])->name('show-payment');
    });

    Route::middleware(['auth'])->group(function () {
        // User Routes
        Route::get('/user/dashboard', [UserUserBookingController::class, 'index'])->name('user-dashboard');
        Route::get('/user/booking/{room}', [UserUserBookingController::class, 'create'])->name('user-booking');
        Route::post('/user/booking/', [UserUserBookingController::class, 'store'])->name('store-user-booking');
        Route::get('/user/booking/show/{booking}', [UserUserBookingController::class, 'show'])->name('show-user');

        Route::get('/user/payment', [userPayment::class, 'index'])->name('user-payment');
        Route::post('/user/payment/{id}/confirm', [userPayment::class, 'confirm'])->name('confirm-payment');
    });
});
