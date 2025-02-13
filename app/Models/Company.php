<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'logo', 'quotes'];

    // Relasi jika diperlukan
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
