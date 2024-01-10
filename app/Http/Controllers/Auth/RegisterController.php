<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Auth;
use DateTime;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, Authenticatable;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'Fname' => ['required', 'string', 'max:255'],
            'Lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        if($data['accountType'] == 'Passenger'){
            unset($data['accountType']);
            $user = User::create([
                'Fname' => $data['Fname'],
                'Lname' => $data['Lname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            Passenger::create([
                'user_id' =>$user->id,
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now')
            ]);

            return $user;


        }elseif ($data['accountType'] == 'Admin'){
            unset($data['accountType']);
            $user = User::create([
                'Fname' => $data['Fname'],
                'Lname' => $data['Lname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            return $user;
        }

    }
}
