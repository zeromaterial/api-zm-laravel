<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['campaign_title', 'campaign_image', 'campaign_location', 'created_by_user_id', 'start_date', 'end_date', 'plant_type', 'total_donation', 'total_trees_donated', 'isactive'];

    // Relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
