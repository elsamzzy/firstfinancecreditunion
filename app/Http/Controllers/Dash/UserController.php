<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\admins;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verifyid']);
    }

    public function index(admins $admins){
        $name = 'Dashboard - User Profile';
        $title = 'user';
        return view('dashboard.user', [
            'name' => $name,
            'title' => $title,
            'admins' => $admins
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'first' => ['string', 'max:255', 'required'],
            'last' => ['string', 'max:255', 'required'],
            'address' => ['string', 'max:255', 'required'],
            'city' => ['string', 'max:255', 'required'],
            'country' => ['string', 'max:255', 'required'],
            'postal' => ['string', 'max:255', 'required'],
            'dob' => ['string', 'max:255', 'required'],
            'ssn' => ['string', 'max:4', 'min:4', 'required'],
            'occupation' => ['string', 'max:255', 'required'],
        ]);

        User::where('id', auth()->user()->id)->update([
            'first_name' => $request['first'],
            'last_name' => $request['last'],
            'address' => $request['address'],
            'city' => $request['city'],
            'country' => $request['country'],
            'postal' => $request['postal'],
            'occupation' => $request['occupation'],
            'dob' => $request['dob'],
            'ssn' => $request['ssn'],
        ]);
        return back()->with('status', 'Successfully changed your account details');
    }

    public function change(Request $request) {
        $this->validate($request, [
            'old_password' => ['string', 'required'],
            'password' => ['string', 'max:255', 'required', 'confirmed'],
        ]);
        $hashedPassword = User::find(auth()->user()->id)->password;
        if (Hash::check($request['old_password'], $hashedPassword)) {
            User::where('id', auth()->user()->id)->update(['password'=> Hash::make($request['password'])]);
            return back()->with('pass', 'Successfully changed your password');
        }

        return back()->with('pass_error','Incorrect password');
    }
}
