<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DocumentType;

class DocumentRequest extends Model
{
    use HasFactory;

     protected $fillable = ['document_type_id', 'recipient_civility','content', 'doctor_id', 'recipient_function', 'request_location', 'structure_category_id', 'structure_name', 'status'];


    public function document_type(){
        return $this->belongsTo(DocumentType::class);
    }

    public function doctor(){
        return $this->belongsTo(DoctorProfile::class, 'doctor_id');
    }

    public function structure_category(){
        return $this->belongsTo(StructureCategory::class, 'doctor_id');
    }
}
