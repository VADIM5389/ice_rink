<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SkateBookingController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard/account', [AccountController::class, 'showAccount'])->name('showAccount');

});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'showAdmin'])->name('showAdmin');

});

// Покупка билета — доступно всем
Route::get('/tickets/buy', [TicketController::class, 'showBuyForm'])->name('tickets.buy');
Route::post('/tickets/buy', [TicketController::class, 'createPayment'])->name('tickets.pay');

// Бронь коньков — только после входа
Route::middleware('auth')->group(function () {
    Route::get('/skates/book', [SkateBookingController::class, 'create'])->name('skates.book');
    Route::post('/skates/book', [SkateBookingController::class, 'store'])->name('skates.book.store');
});

Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

