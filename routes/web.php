<?php

use App\Models\Flight;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('verify', function () {
    return view('auth.verify');
});


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

Route::post('booking', function (Request $request)  {

    $type = $request['type'];
    $passengers = $request['passengers'];
    $flight = Flight::where('id',$request['flight_id'])->first();
    if($type == 'economy'){
        $class_prise = \App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_econ_class;
    }else if($type == 'business'){
        $class_prise = \App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_bus_class;
    }else{
        $class_prise = \App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_first_class;

    }
    $total_price = $class_prise * $passengers;

    $user = Auth::user();
    $is_passenger = \App\Models\Passenger::where('user_id',$user->id)->exists();
    if($is_passenger){
        return view('passenger.pages.tickets.new_ticket')->with(compact('type','flight','passengers','total_price'));

    }else{
        return view('layouts.permission_view');
    }
})->middleware('auth')->name('booking');

Route::get('booking', function ()  {
        return view('layouts.permission_view');
})->middleware('auth')->name('booking');

// User profile

Route::get('profile', function () {
    $user = Auth::user();
    $is_admin = DB::table('admins')->where('user_id', $user->id)->exists();
    $is_passenger = DB::table('passengers')->where('user_id', $user->id)->exists();
    return view('user.user-profile')->with(compact('is_admin','is_passenger','user'));
})->middleware('auth')->name('profile');

Route::get('complete-payment' ,function (){
    $user = Auth::user();
    $is_passenger = \App\Models\Passenger::where('user_id',$user->id)->exists();
    if($is_passenger){
        $passenger = \App\Models\Passenger::where('user_id',$user->id)->first();
        $tickets_list = \App\Models\Ticket::where('passenger_id',$passenger->id)->get();
        $total_price = 0;
        if(\App\Models\Ticket::where('passenger_id',$passenger->id)->count() == 0){
            $message = __('Sorry! You do not has any ticket needs payment.');
          return view('layouts.error_view')->with(compact('message'));
        }
        return view('passenger.pages.tickets.payment_ticket')->with(compact('passenger','tickets_list','total_price'));
    }else{
        return view('layouts.permission_view');
    }
})->middleware('auth')->name('complete-payment');;


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
