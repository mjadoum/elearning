<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Task;
use App\Models\Course;
use App\Models\Feedback;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    'name',
    'email',
    'password',
    'color', // Add 'color' here if you want to allow mass assignment
];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
    public function posts()
    {
    return $this->hasMany(Post::class);
    }
    public function comments()
    {
    return $this->hasMany(Comment::class);
    }
    public function completedTasks()
    {
        return $this->belongsToMany(Task::class, 'completed_tasks', 'user_id', 'task_id')->withTimestamps();
    }
public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'usercourses', 'user_id', 'course_id')->withTimestamps();
    }
public function isMember()
    {
        return $this->role === 'member';
    }



}
