<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'name',
        'species',
        'image',
        'description',
        'growing_conditions',
        'benefit',
        'price',
    ];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
