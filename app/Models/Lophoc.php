<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Lophoc extends Model
{
    use Searchable; 
    
    protected $fillable = [
        'id',
        'name',
        'begin_at',
        'number_of_lesson',
        'max_slot',
        'available_slot',
        'price',
        'discount',
        'teacher_id',
    ];

    protected $timestamp = true;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
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
