<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['article_title', 'article_image', 'article_description', 'publication_date', 'created_by_user_id', 'read_count'];

    // Relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
