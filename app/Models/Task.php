<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = [
        'course_id',
        'task_title',
        'image_path',
        'task_text',
    ];
    public function course()
    {
    return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function completedBy()
    {
        return $this->belongsToMany(User::class, 'completed_tasks', 'task_id', 'user_id')->withTimestamps();
    }
    public function isCompletedByUser($userId)
    {
        return $this->completedBy()->where('user_id', $userId)->exists();
    }

}
