<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [ 'comment_id','user_id', 'reply_text',];

    public function comment()
{
    return $this->belongsTo(Comment::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}


}
