<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_messages extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
        'subject',
      'messages'
    ];

    public function userMessageCount() {
        return $this->get()->where('user_id', auth()->user()->id)->count();
    }
}
