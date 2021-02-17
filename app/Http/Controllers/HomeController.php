<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Models\transactions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verifyid']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(transactions $transactions, admins $admins)
    {
        $name = "Dashboard";
        $title = 'dashboard';
        $trans = $transactions->trans();
        return view('home',[
         'name' => $name,
            'title' => $title,
            'transactions' => $transactions,
            'trans' => $trans,
            'admins' => $admins
        ]);
    }
}
