<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Course extends Model
{
    protected $fillable = [
        'course_name',
        'course_description',
        'catalog_id',
        'image_path',
        'level',
        'time_long',	
        'complete',
    ];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
     protected static function boot()
    {
        parent::boot();

        // Attach an event listener for when a course is being deleted
        static::deleting(function ($course) {
            // Delete the associated tasks when a course is deleted
            $course->tasks()->delete();
        });
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function courseContent()
    {
        return $this->hasOne(CourseContent::class);
    }
    public function enrolledByUsers()
    {
        return $this->belongsToMany(User::class, 'usercourses', 'course_id', 'user_id')->withTimestamps();
    }
 
}
