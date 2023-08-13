<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'front',
        'back',
        'b_name',
        'b_f_name',
        'b_id_number',
        'b_mobile',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
