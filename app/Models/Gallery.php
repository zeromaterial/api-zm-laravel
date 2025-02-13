<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['campaign_id', 'image_path', 'gallery_image'];

    // Relasi
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
