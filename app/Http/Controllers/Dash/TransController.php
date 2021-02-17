<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\admins;
use App\Models\transactions;
use Illuminate\Http\Request;

class TransController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verifyid']);
    }

    public function index(transactions $transactions, admins $admins){
        $trans = transactions::latest()->get()->where('user_id', auth()->user()->id);
        $name = 'Dashboard - Transactions';
        $title = 'trans';
        return view('dashboard.transactions', [
            'name' => $name,
            'title' => $title,
            'transactions' => $transactions,
            'trans' => $trans,
            'admins' => $admins
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'bank' => ['max:255', 'string', 'required'],
            'name' => ['max:255', 'string', 'required'],
            'number' => ['max:255', 'string', 'required'],
            'amount' => ['max:255', 'string', 'required'],
        ]);
        if($request['amount'] > auth()->user()->current_balance){
            return back()->with('insufficient', 'You have insufficient balance');
        }

        return back()->with('send', 'Sending to destination');
    }
}
