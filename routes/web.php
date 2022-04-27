<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// For Sign in with Google
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [App\Http\Controllers\GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [App\Http\Controllers\GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

// for change language
Route::get('lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::resource('admin','App\Http\Controllers\AdminController');
Route::resource('payment','App\Http\Controllers\PaymentController');
Route::resource('passenger','App\Http\Controllers\PassengerController');
Route::resource('aircraft','App\Http\Controllers\AircraftController');
Route::resource('plane','App\Http\Controllers\PlaneController');
Route::resource('flight','App\Http\Controllers\FlightController');
Route::resource('luggage','App\Http\Controllers\LuggageController');
Route::resource('ticket','App\Http\Controllers\TicketController');

Route::get('airport', [App\Http\Controllers\AirportsController::class, 'getAirportsInfo']);
Route::post('search-one-way', [App\Http\Controllers\SearchController::class, 'one_way_search'])->name('search-one-way');
Route::post('search-round-trip', [App\Http\Controllers\SearchController::class, 'round_trip_search'])->name('search-round-trip');


