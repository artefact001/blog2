<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'creation_date', 'image'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
