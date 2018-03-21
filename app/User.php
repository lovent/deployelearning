<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Searchable;
    
    protected $fillable = [
        'user_id',
        'email',
        'name',
        'password',
        'active',
        'gender',
        'avatar_url',
        'address',
        'phone_number',
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
