<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/index', [AuthController::class, 'index'])->name('index');
// Route::get('/admin/user',[AuthController::class,'userlist'])->name('userlist');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth'); // Apply authentication middleware to restrict access to authenticated users only

Route::middleware('auth')->group(function () {
    Route::get('/index', [AuthController::class, 'index'])->name('index');
    Route::get('/index', [AuthController::class, 'showPendingRequests'])->name('index');
    // Route::get('/admin/pending-requests',[AuthController::class, 'showPendingRequests'])->name('admin.pending-requests');
    Route::post('/admin/accept-request/{user}',[AuthController::class, 'acceptRequest'])->name('admin.accept-request');
    Route::post('/admin/reject-request/{user}', [AuthController::class, 'rejectRequest'])->name('admin.reject-request');


    // User Component
    Route::get('/admin/user', [UserController::class, 'userlist'])->name('userlist');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/user/{id}/enable', [UserController::class, 'enable'])->name('user.enable');
    Route::put('/user/{id}/disable', [UserController::class, 'disable'])->name('user.disable');

    // Hotel Component
    Route::get('/admin/hotelview', [HotelController::class, 'hotellist'])->name('hotellist');
    Route::get('/addhotel', [HotelController::class, 'create'])->name('addhotel');
    Route::post('/hotel/store', [HotelController::class, 'store'])->name('hotel.store');
    Route::get('/hotel/{id}/edit', [HotelController::class, 'updateview'])->name('hotel.update');
    Route::put('/hotel/{id}', [HotelController::class, 'update'])->name('hotel_update');
    Route::delete('/hotel/{id}', [HotelController::class, 'destroy'])->name('hotel.destroy'); // Corrected route
});
