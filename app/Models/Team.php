<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'image', 'role'];

    // Relasi jika diperlukan
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
