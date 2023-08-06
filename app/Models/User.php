<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'mobile',
        'country',
        'refer',
        'status',
        'networker',
        'password',
        'left_user_in',
        'right_user_in',
        'binary_match'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }


    public function userPlan()
    {
        return $this->hasOne(UserPlan::class);
    }


    public function tids()
    {
        return $this->hasMany(Tid::class);
    }

    public function my_left_user()
    {
        return $this->belongsTo(User::class, 'my_left_user_id');
    }

    public function my_right_user()
    {
        return $this->belongsTo(User::class, 'my_right_user_id');
    }


    public function left_user()
    {
        return $this->belongsTo(User::class, 'left_user_id');
    }


    public function right_user()
    {
        return $this->belongsTo(User::class, 'right_user_id');
    }

    public function getDownline($side)
    {
        $downline = [];

        if ($side === 'left') {
            if ($this->left_user) {
                $downline[] = $this->left_user;
                $downline = array_merge($downline, $this->left_user->getDownline('left'));
                $downline = array_merge($downline, $this->left_user->getDownline('right'));
            }
        } elseif ($side === 'right') {
            if ($this->right_user) {
                $downline[] = $this->right_user;
                $downline = array_merge($downline, $this->right_user->getDownline('left'));
                $downline = array_merge($downline, $this->right_user->getDownline('right'));
            }
        }

        return $downline;
    }

    public function getMyDownline($side)
    {
        $downline = [];

        if ($side === 'left') {
            if ($this->left_user) {
                $downline[] = $this->my_left_user;
                $downline = array_merge($downline, $this->my_left_user->getDownline('left'));
                $downline = array_merge($downline, $this->my_left_user->getDownline('right'));
            }
        } elseif ($side === 'right') {
            if ($this->right_user) {
                $downline[] = $this->my_right_user;
                $downline = array_merge($downline, $this->my_right_user->getDownline('left'));
                $downline = array_merge($downline, $this->my_right_user->getDownline('right'));
            }
        }

        return $downline;
    }

    public function freeze_transactions()
    {
        return $this->hasMany(FreezeTransaction::class);
    }
}
