<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celebritie extends Model
{
    protected $fillable = ['name', 'job', 'image_path','description','net']; // Define fillable fields

}
