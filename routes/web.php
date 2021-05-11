<?php
// customer id will be inserted to booking table 
// use bookings table to start booking
// 

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingRoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomFacilityController;
use App\Http\Controllers\UserController;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Booking;
use App\Models\BookingRoom;
use App\Models\PaymentMethod;
use App\Models\RoomFacility;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
    return view('welcome',[
        'customerCount' => Customer::count(),
        'guestCount' => Guest::count(),
        'roomCount' => Room::count(),
        'bookingroomCount' => Booking::count(),
        'guestbooking' => BookingRoom::count('guest_id'),
        'paymentmethod' => PaymentMethod::count(),
        'roomfacility' => RoomFacility::count(),
        'availableroom' => Room::max('room_id') - BookingRoom::count('room_id'),
        ]);
});

// about me and contact

Route::get('/about',function() {
    return view('sidebars.about');
})->name('sidebars.about');

Route::get('/contact',function(){
    return view('sidebars.contact');
})->name('sidebars.contact');

// Customer Controller

Route::get('/customers',[CustomerController::class,'index'])->name('customers.index');    

Route::get('/customers/add',[CustomerController::class,'create'])->name('customers.create');

Route::post('/customers',[CustomerController::class,'store'])->name('customers.store');

Route::get('/customers/search',[CustomerController::class,'search'])->name('customers.search');

Route::post('/customers/update',[CustomerController::class,'update'])->name('customers.update');

Route::get('/customers/{id}',[CustomerController::class,'show'])->name('customers.show');   

Route::delete('/customers/{id}',[CustomerController::class,'destroy'])->name('customers.destroy');

// Guest Controller

Route::get('/guests',[GuestController::class,'index'])->name('guests.index');

Route::get('/guests/add',[GuestController::class,'create'])->name('guests.create');

Route::post('/guests',[GuestController::class,'store'])->name('guests.store');

Route::post('/guests/update',[GuestController::class,'update'])->name('guests.update');

Route::get('/guests/search',[GuestController::class,'search'])->name('guests.search');

Route::get('/guests/{id}',[GuestController::class,'show'])->name('guests.show');

Route::delete('/guests/{id}',[GuestController::class,'destroy'])->name('guests.destroy');

// Rooms

Route::get('/rooms',[RoomController::class,'index'])->name('rooms.index');

Route::get('/rooms/add',[RoomController::class,'create'])->name('rooms.create');

Route::post('/rooms',[RoomController::class,'store'])->name('rooms.store');

Route::post('/rooms/update',[RoomController::class,'update'])->name('rooms.update');

Route::get('/rooms/search',[RoomController::class,'search'])->name('rooms.search');

Route::delete('/rooms/{id}',[RoomController::class,'destroy'])->name('rooms.destroy');

Route::get('/rooms/{id}',[RoomController::class,'show'])->name('rooms.show');

// Bookings
Route::get('/bookings',[BookingController::class,'index'])->name('bookings.index');

Route::get('/bookings/search',[BookingController::class,'search'])->name('bookings.search');

Route::get('/bookings/create',[BookingController::class,'create'])->name('bookings.create');

Route::post('/bookings',[BookingController::class,'store'])->name('bookings.store');

Route::delete('/bookings/{id}',[BookingController::class,'destroy'])->name('bookings.destroy');

Route::get('/bookings/{id}',[BookingController::class,'show'])->name('bookings.show');

// checked in\

Route::get('/bookingrooms',[BookingRoomController::class,'index'])->name('bookingrooms.index');

// available room
Route::get('/availablerooms',[BookingRoomController::class,'available'])->name('availablerooms.index');

Route::get('/bookingrooms/search',[BookingRoomController::class,'search'])->name('bookingrooms.search');

Route::post('/bookingrooms',[BookingRoomController::class,'store'])->name('bookingrooms.store');

Route::delete('/bookingrooms/{id}',[BookingRoomController::class,'destroy'])->name('bookingrooms.destroy');

Route::get('/bookingrooms/{id}',[BookingRoomController::class,'show'])->name('bookingrooms.show');

// rooms facilities
Route::get('/roomfacilities',[RoomFacilityController::class,'index'])->name('roomfacilities.index');

Route::post('/roomsfacilities/update',[RoomFacilityController::class,'update'])->name('roomfacilities.update');

Route::get('/roomfacilities/search',[RoomFacilityController::class,'search'])->name('roomfacilities.search');

Route::get('/roomfacilities/add',[RoomFacilityController::class,'create'])->name('roomfacilities.create');

Route::post('/roomfacilities',[RoomFacilityController::class,'store'])->name('roomfacilities.store');

// Route::delete('/roomfacilities/{id}',[RoomFacilityController::class,'destroy'])->name('roomfacilities.destroy');

Route::get('/roomfacilities/{id}',[RoomFacilityController::class,'show'])->name('roomfacilities.show');

// payment method
Route::get('/paymentmethods',[PaymentMethodController::class,'create'])->name('paymentmethods.create');

Route::post('/paymentmethods',[PaymentMethodController::class,'store'])->name('paymentmethods.store');

// download pdf

Route::get('/customerpdf',[UserController::class,'customer'])->name('pdfreports.customer');
Route::get('/guestpdf',[UserController::class,'guest'])->name('pdfreports.guest');
Route::get('/roompdf',[UserController::class,'room'])->name('pdfreports.room');
Route::get('/bookingroompdf',[UserController::class,'bookingroom'])->name('pdfreports.bookingroom');
Route::get('/roomfacilitypdf',[UserController::class,'roomfacility'])->name('pdfreports.roomfacility');
// Route::get('/downloadpdf',[CustomerController::class,'index'])->name('customerpdf.index');

// Authentication

Auth::routes([
    
]);


Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');