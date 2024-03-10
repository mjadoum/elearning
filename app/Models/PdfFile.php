<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfFile extends Model {
    protected $fillable = ['pdf_id', 'book_id', 'originalName', 'path', 'mimeType'];
    use HasFactory;

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
