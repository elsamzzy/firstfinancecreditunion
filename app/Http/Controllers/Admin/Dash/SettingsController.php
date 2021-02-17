<?php

namespace App\Http\Controllers\Admin\Dash;

use App\Http\Controllers\Controller;
use App\Models\admins;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function index(admins $admins) {
        $name =  auth()->guard('admin')->user()->username."'s Messages";
        $title = 'setting';
        return view('admin.dashboard.settings', [
            'name' => $name,
            'title' => $title,
            'admins' => $admins
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'old_password' => ['string', 'required'],
            'password' => ['string', 'max:255', 'required', 'confirmed'],
        ]);
        $hashedPassword = admins::find(auth()->guard('admin')->user()->id)->password;
        if (Hash::check($request['old_password'], $hashedPassword)) {
            admins::where('id', auth()->guard('admin')->user()->id)->update(['password'=> Hash::make($request['password'])]);
            return back()->with('pass', 'Successfully changed your password');
        }

        return back()->with('pass_error','Incorrect password');
    }

    public function chat(Request $request, admins $admins) {
        $this->validate($request, [
           'chat' => ['required']
        ]);

        admins::where('id', auth()->guard('admin')->user()->id)->update([
            'chatAPI' => $request['chat']
        ]);

        return back()->with('chat', 'Successfully changed your live support chat link');

    }

    public function smtp(Request $request){
        $this->validate($request, [
            'name' => ['string', 'required', 'max:255'],
            'username' => ['email', 'required'],
            'password' => ['string', 'required']
        ]);

        $pass = Crypt::encryptString($request['password']);

        admins::where('id', auth()->guard('admin')->user()->id)->update([
            'host_name' => $request['name'],
            'host_username' => $request['username'],
            'host_password' => $pass,
        ]);

        return back()->with('smtp', 'Successfully updated your SMTP mailing Settings');
    }
}
