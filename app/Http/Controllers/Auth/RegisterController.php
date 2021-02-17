<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
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

    use RegistersUsers;

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
            'officer' => ['required', 'string', 'max:255'],
            'first' => ['required', 'string', 'max:255'],
            'last' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'dob' => ['required', 'max:255', 'string'],
            'occupation' => ['required', 'max:25', 'string'],
            'ssn' => ['required', 'min:4', 'max:4'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first'],
            'last_name' => $data['last'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'pass' => Crypt::encryptString($data['password']),
            'admins_id' => $data['officer'],
            'ssn' => $data['ssn'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'occupation' => $data['occupation'],
            'verified_id' => '0',
            'open_balance' => '0',
            'current_balance' => '0',
            'current_credit' => '0',
            'open_credit' => '0',
            'closed_balance' => '0',
            'closed_credit' => '0',
        ]);
    }
}
