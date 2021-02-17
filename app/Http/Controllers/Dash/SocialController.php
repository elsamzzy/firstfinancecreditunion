<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\admin_messages;
use App\Models\admins;
use App\Models\users_messages;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verifyid']);
    }

    public function index(admin_messages $admin_messages, users_messages $users_messages, admins $admins){
        $name = 'Dashboard - Socials/Support';
        $title = 'socials';
        $to_user = admin_messages::latest()->get()->where('user_id', auth()->user()->id);
        $to_admin = users_messages::latest()->get()->where('users_id', auth()->user()->id);
        return view('dashboard.contact', [
            'name' => $name,
            'title' => $title,
            'to_user' => $to_user,
            'to_admin' => $to_admin,
            'admin_messages' => $admin_messages,
            'user_messages' => $users_messages,
            'admins' => $admins
        ]);
    }

    public function store(Request $request, users_messages $users_messages) {
        $this->validate($request, [
            'subject' => ['string','max:255','required'],
            'message' => ['string', 'max:255', 'required']
        ]);

        users_messages::create([
            'admins_id' => auth()->user()->admins_id,
            'users_id' => auth()->user()->id,
            'subject' => $request['subject'],
            'message' => $request['message']
        ]);
        return back();
    }
}
