<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable = ['user_id', 'quotes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
