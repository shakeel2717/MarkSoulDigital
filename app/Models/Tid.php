<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tid extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wallet_id',
        'amount',
        'fees',
        'exchange',
        'screenshot',
        'hash_id',
        'status',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
}
