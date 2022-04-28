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
Route::prefix('google')->name('google.')->group(function () {
    Route::get('login', [App\Http\Controllers\GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [App\Http\Controllers\GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

// for change language
Route::get('lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::resource('admin', 'App\Http\Controllers\AdminController');
Route::resource('payment', 'App\Http\Controllers\PaymentController');
Route::resource('passenger', 'App\Http\Controllers\PassengerController');
Route::resource('aircraft', 'App\Http\Controllers\AircraftController');
Route::resource('plane', 'App\Http\Controllers\PlaneController');
Route::resource('flight', 'App\Http\Controllers\FlightController');
Route::resource('luggage', 'App\Http\Controllers\LuggageController');
Route::resource('ticket', 'App\Http\Controllers\TicketController');

Route::get('airport', [App\Http\Controllers\AirportsController::class, 'getAirportsInfo']);
Route::post('search-one-way', [App\Http\Controllers\SearchController::class, 'one_way_search'])->name('search-one-way');
Route::post('search-round-trip', [App\Http\Controllers\SearchController::class, 'round_trip_search'])->name('search-round-trip');


// For passenger route
Route::get('/dashboard', function () {
    $user = Auth::user();
    $is_passenger = \App\Models\Passenger::where('user_id',$user->id)->exists();
    if($is_passenger){
        return view('passenger.pages.dashboard');
    }else{
        return view('layouts.permission_view');
    }

})->middleware('auth');

Route::get('/new-ticket', function () {
    $user = Auth::user();
    $is_passenger = \App\Models\Passenger::where('user_id',$user->id)->exists();
    if($is_passenger){
        return view('passenger.pages.tickets.new_ticket');
    }else{
        return view('layouts.permission_view');
    }
})->middleware('auth');

// Footer
Route::get('/FAQ', function () {
    return view('layouts.__config.FAQ');
});

Route::get('/Special_Services', function () {
    return view('layouts.__config.special_services');
});

Route::get('/Terms_Conditions', function () {
    return view('layout.__config.terms_conditions');
});
