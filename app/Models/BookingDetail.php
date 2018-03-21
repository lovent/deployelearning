<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'price',
        'booking_id',
        'lophoc_id',
    ];

    protected $timestamp = true;

    protected $dates = ['deleted_at'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function lophocs()
    {
    	return $this->hasMany(Lophoc::class);
    }
}
