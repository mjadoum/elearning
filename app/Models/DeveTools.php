<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DeveToolItems;
class DeveTools extends Model
{
    protected $table = 'devetools';
    protected $fillable = [
        'tool_name',
        'image_path',
        'tool_description',
    ];

    public function deveToolItems()
{
    return $this->hasMany(DeveToolItems::class, 'devetool_id', 'id');
}
}
