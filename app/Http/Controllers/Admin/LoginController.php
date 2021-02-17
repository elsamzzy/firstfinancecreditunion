<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        return redirect()->route('index');
        //$this->middleware(['adminguest','guest']);
    }

    public function index() {
        return view('admin.auth.login');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'username' => ['required','max:255'],
            'password' => ['required']
        ]);


        if (Auth::guard('admin')->attempt($request->only('username','password'), $request->filled('remember'))) {
            //$details = Auth::guard('admin')->user();
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('status', 'Incorrect Login details');
        }
    }
}
