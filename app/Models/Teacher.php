<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    use Searchable;
    
    protected $fillable = [
        'id',
        'email',
        'avatar_url',
        'name',
        'gender',
        'active',
        'graduated_at',
        'experience',
        'school_id',
    ];

    protected $dates = ['deleted_at'];

    public function lophocs()
    {
        return $this->hasMany(Lophoc::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
