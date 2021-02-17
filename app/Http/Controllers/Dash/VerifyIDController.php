<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Mail\alertMail;
use App\Mail\VerifyID;
use App\Models\admins;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerifyIDController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verify.done'])->except('confirm');
    }

    public function index(admins $admins) {
        $name = "Submit ID for Verification";
        $title = 'id';
        return view('dashboard.id', [
            'name' => $name,
            'title' => $title,
            'admins' => $admins
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'front' => ['required'],
            'back' => ['required']
        ]);

        $username = auth()->user()->username;

        //front id logic
        $type = $request['front']->getClientmimeType();
        $image = 'null';
        if($type === 'image/jpeg'){
            $image = 'supported';
            $fex = '.jpg';
        }

        if($type === 'image/png'){
            $image = 'supported';
            $fex = '.png';
        }

        if($image === 'null'){
            return back()->with('front', 'The file is unsupported, Please upload a .jpg or .png file');
        }

        //back id logic
        $type = $request['back']->getClientmimeType();
        $image = 'null';
        if($type === 'image/jpeg'){
            $image = 'supported';
            $bex = '.jpg';
        }

        if($type === 'image/png'){
            $image = 'supported';
            $bex = '.png';
        }

        if($image === 'null'){
            return back()->with('back', 'The file is unsupported, Please upload a .jpg or .png file');
        }

        $request->file('front')->storeAs('public/id', $username.'front'.$fex);
        $request->file('back')->storeAs('public/id', $username.'back'.$bex);

        User::where('id', auth()->user()->id)->update([
            'front_extension' => $fex,
            'back_extension' => $bex
        ]);

        return back();
    }

    public function confirm(Request $request, admins $admins) {
        $user = $request['user'];
        User::where('id', $user)->update([
            'verified_id' => '1'
        ]);
        $username = User::where('id', $user)->first();
        config([
            'mail.mailers.smtp.username' => $admins->user()->host_username,
            'mail.mailers.smtp.password' => $admins->hostPass(),
            'mail.from.address' => $admins->user()->host_username,
            'mail.from.name' => $admins->user()->host_name,
        ]);
        Mail::to($username->email)->send(new VerifyID());
        return back()->with('id', 'You have approved '.$username->username.' ID card');
    }
}
