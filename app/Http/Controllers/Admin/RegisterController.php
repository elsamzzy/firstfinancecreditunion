<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['adminguest','guest']);
    }

    public function index() {
        $title = "First Financial Bank";
        return view('admin.auth.register', [
            'title' => $title
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'code' => ['required', 'max:10'],
            'username' => ['required', 'string', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $code = 8526;
        if($request['code'] != $code){
            return back()->with('code', 'Staff code is incorrect or does not exist');
        }

        $admin = admins::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password'])
        ]);

        Auth::guard('admin')->login($admin);
        return redirect()->route('admin.dashboard');
    }
}
