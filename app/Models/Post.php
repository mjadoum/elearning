<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'message', 'image_path']; // Define fillable fields

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
{
    return $this->hasMany(Comment::class);
}
public function commentsCount() {
        return $this->comments()->count();
    }
   
}
