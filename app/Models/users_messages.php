<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_messages extends Model
{
    use HasFactory;

    protected $fillable = [
      'admin_id',
      'user_id',
      'subject',
      'message'
    ];

    public function adminMessageCount() {
        return $this->get()->where('admin_id', auth()->guard('admin')->user()->id)->count();
    }

    public function userMessageCount() {
        return $this->get()->where('user_id', auth()->user()->id)->count();
    }
}
