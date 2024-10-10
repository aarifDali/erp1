<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'document_number', 'document_type_id', 'user_id'
    ];

    public function document_type() {
        return $this->belongsTo(DocumentType::class);
    }
}
