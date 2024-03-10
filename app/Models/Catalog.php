<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Catalog extends Model
{
    protected $fillable = [
        'catalog_name',
        'catalog_description',
    ];
        public function courses()
{
    return $this->hasMany(Course::class);
}
}
