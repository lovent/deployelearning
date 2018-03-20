<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\User;

class School extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'searchschool';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }

    protected $fillable = [
        'id',
        'name',
        'description',
        'city',
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
