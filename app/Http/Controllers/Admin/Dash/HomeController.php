<?php

namespace App\Http\Controllers\Admin\Dash;

use App\Http\Controllers\Controller;
use App\Models\admins;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function index(admins $admins, User $user) {
        $name =  auth()->guard('admin')->user()->username."'s Dashboard";
        $title = 'dash';
        $customer = $user->under();
        return view('admin.dashboard.index', [
            'name' => $name,
            'title' => $title,
            'admin' => $admins,
            'user' => $user,
            'customer' => $customer
        ]);
    }
}
