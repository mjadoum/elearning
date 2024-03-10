<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $table = 'courses_content';
    protected $fillable = [
        'course_id',
        'book_name',
        'pdf_path',
        'book_cover',
        'what_to_learn',
        'youtube_title',
        'youtube_link',	
        'introduction',
        'resource_name',
        'resource_link',
    ];
    
    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}


