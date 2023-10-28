<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('events', [EventController::class, 'index']);
Route::get('create-event', [EventController::class, 'createEvent'])->name('create-event');
Route::get('availability', [AvailabilityController::class, 'availability'])->name('availability');
Route::post('create-availability', [AvailabilityController::class, 'createAvailability'])->name('create-availability');
Route::post('edit-availability', [AvailabilityController::class, 'editAvailability'])->name('edit-availability');
Route::get('delete-availability/{id}', [AvailabilityController::class, 'deleteAvailability'])->name('delete-availability');

// testing 
Route::view('test', 'test');
Route::view('test2', 'test2');
Route::view('test-modal', 'modal');

// Booking pages
Route::get('booking-page/{eventId}', [BookingController::class, 'bookingPage'])->name('booking-page');
Route::get('book-register', [BookingController::class, 'bookRegister'])->name('book-register');
Route::post('book', [BookingController::class, 'book'])->name('book');
Route::get('confirm-booking', [BookingController::class, 'confirmBooking'])->name('confirm-booking');

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
Route::view('calendar', 'calendar');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
