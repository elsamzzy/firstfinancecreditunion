<?php

namespace App\Http\Controllers\Admin\Dash;

use App\Http\Controllers\Controller;
use App\Models\admins;
use App\Models\User;
use App\Models\users_messages;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function index(users_messages $users_messages, admins $admins, User $user) {
        $name =  auth()->guard('admin')->user()->username."'s Messages";
        $mess = users_messages::latest()->get()->where('admin_id', auth()->guard('admin')->user()->id);
        $title = 'message';
        $admin = $admins;
        return view('admin.dashboard.messages', [
            'name' => $name,
            'title' => $title,
            'messages' => $users_messages,
            'admin' => $admin,
            'mess' => $mess,
            'user' => $user
        ]);
    }
}
