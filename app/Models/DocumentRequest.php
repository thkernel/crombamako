<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DocumentType;

class DocumentRequest extends Model
{
    use HasFactory;

     protected $fillable = ['document_type_id', 'title','content', 'doctor_id'];


     public function document_type(){
        return $this->belongsTo(DocumentType::class);
    }
}
