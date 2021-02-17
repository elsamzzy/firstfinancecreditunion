<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Admin as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class admins extends Authenticatable
{
    public $table = 'admins';
    use HasFactory;

    protected $fillable = [
      'username',
      'password'
    ];

    protected $hidden = [
        'password',
    ];

    public function officersList() {
        return $this->get();
    }

    public function user() {
        return auth()->guard('admin')->user();
    }

    public function disChat() {
        $chat = $this->get()->where('id', auth()->user()->admins_id);
        foreach ($chat as $item){
            $chat_api = $item->chatAPI;
        }
        return $chat_api;
    }

    public function hostPass() {
        $encryptedPass = $this->user()->host_password;
        try {
            return Crypt::decryptString($encryptedPass);
        } catch (DecryptException $e) {
            //
        }
    }
}
