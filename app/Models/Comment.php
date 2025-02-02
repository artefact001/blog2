<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'content'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}

