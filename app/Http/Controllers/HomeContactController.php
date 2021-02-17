<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeContactController extends Controller
{
    public function __construct()
    {

    }

    public function index() {
        $title = "Most Popular Personal Banking Options | First Financial Bank";
        $des = "See our most popular banking options like personal checking accounts, savings accounts, prepaid reloadable cards, & our banking app with mobile deposit.";
        return view('contact', [
            'title' => $title,
            'des' => $des
        ]);
    }

    public function store() {
        return back()->with('contact', 'Your calm has been sent successfully, Your would be contact via your email');
    }
}
