<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DeveTools;
class DeveToolItems extends Model
{
    protected $table = 'devetool_items';
    protected $fillable = [
        'devetool_id',
        'item_name',
        'image_path',
        'description',
        'link',
        'item_type',
    ];
    public function deveTools()
{
    return $this->belongsTo(DeveTools::class, 'devetool_id', 'id');
}
}
