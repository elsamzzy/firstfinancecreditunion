<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'type',
        'amount',
        'account_name',
        'account_number',
        'user_id'
    ];

    public function num() {
        return $this->get()->where('user_id', auth()->user()->id)->count();
    }

    public function trans() {
        return $this->get()->where('user_id', auth()->user()->id);
    }
}
