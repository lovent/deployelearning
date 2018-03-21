<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'point',
        'content',
        'user_id',
        'lophoc_id',
    ];

    protected $dates = ['deleted_at'];

    protected $timestamp = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lophoc()
    {
        return $this->belongsTo(Lophoc::class);
    }
}
