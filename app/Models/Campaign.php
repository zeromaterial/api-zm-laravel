<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'image',
        'location',
        'created_by_user_id',
        'start_date',
        'end_date',
        'plant_id',
        'target_donation',
        'collected_donation',
        'total_trees_donated',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
