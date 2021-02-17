<?php

namespace App\Http\Controllers\Admin\Dash;

use App\Http\Controllers\Controller;
use App\Mail\alertMail;
use App\Mail\creditAlertMail;
use App\Mail\TransferSuccessful;
use App\Models\admin_messages;
use App\Models\admins;
use App\Models\transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth');
    }

    public function index(Request $request, User $user) {
        $customer = $request['user'];
        $name =  auth()->guard('admin')->user()->username."'s Dashboard | ".$request['user']->username."'s Profile";
        $title = 'dash';
        return view('admin.dashboard.user', [
            'user' => $customer,
            'name' => $name,
            'users' => $user,
            'title' => $title,
        ]);
    }

    public function store(Request $request, User $user, admin_messages $admin_messages) {
        $this->validate($request,[
            'subject' => ['string', 'max:255', 'required'],
            'message' => ['string', 'max:255', 'required']
        ]);

        admin_messages::create([
            'user_id' => $user->id,
            'subject' => $request['subject'],
            'messages' => $request['message']
        ]);
        return back()->with('message', 'Message Successfully sent');
    }

    public function balance(Request $request, User $user, transactions $transactions, admins $admins) {
        $balance = trim($request['balance'], '$');
        $this->validate($request, [
            'balance' => ['required', 'string']
        ]);
        $current_balance = $user->current_balance;
        if($balance < $current_balance) {
            $amount = $current_balance - $balance;
            transactions::create([
                'user_id' => $user->id,
                'type' => 'Outgoing',
                'amount' => $amount,
            ]);
            config([
                'mail.mailers.smtp.username' => $admins->user()->host_username,
                'mail.mailers.smtp.password' => $admins->hostPass(),
                'mail.from.address' => $admins->user()->host_username,
                'mail.from.name' => $admins->user()->host_name,
            ]);
            $details = array();
            array_push($details, $balance);
            array_push($details, $current_balance);
            array_push($details, $amount);

            Mail::to($user->email)->send(new alertMail($details));
        }else{
            $amount = $balance - $current_balance;
            transactions::create([
                'user_id' => $user->id,
                'type' => 'Incoming',
                'amount' => $amount,
            ]);
            config([
                'mail.mailers.smtp.username' => $admins->user()->host_username,
                'mail.mailers.smtp.password' => $admins->hostPass(),
                'mail.from.address' => $admins->user()->host_username,
                'mail.from.name' => $admins->user()->host_name,
            ]);
            $details = array();
            array_push($details, $balance);
            array_push($details, $current_balance);
            array_push($details, $amount);

            Mail::to($user->email)->send(new creditAlertMail($details));
        }
        User::where('id', $user->id)->update([
            'current_balance' => $balance
        ]);
        return back()->with('balance', 'Balance has been updated');
    }

    public function credit(Request $request, User $user) {
        $credit = $request['credit'];
        $this->validate($request, [
            'credit' => ['required', 'string']
        ]);
        User::where('id', $user->id)->update([
            'current_credit' => $credit
        ]);

        return back()->with('credit', 'Credit score has been updated');
    }
}
