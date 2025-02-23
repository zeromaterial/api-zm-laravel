<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationType extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
