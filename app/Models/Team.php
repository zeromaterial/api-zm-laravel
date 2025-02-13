<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['member_name', 'member_role'];

    // Relasi jika diperlukan
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
