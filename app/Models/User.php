<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'username',
        'address',
        'city',
        'dob',
        'ssn',
        'front_extension',
        'back_extension',
        'occupation',
        'country',
        'postal',
        'open_balance',
        'current_balance',
        'current_credit',
        'open_credit',
        'closed_balance',
        'closed_credit',
        'admins_id',
        'verified_id',
        'pass'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function under() {
        return $this->get()->where('admins_id', auth()->guard('admin')->user()->id);
    }

    public function num() {
        return $this->get()->where('admins_id', auth()->guard('admin')->user()->id)->count();
    }

    public function user($id) {
        return $this->get()->where('id', $id);
    }

    public function enPass($pass) {
        return Crypt::encryptString($pass);
    }

    public function dePass($pass) {
        return Crypt::decryptString($pass);
    }

}
