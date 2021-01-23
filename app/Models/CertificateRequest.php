<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CertificateType;

class CertificateRequest extends Model
{
    use HasFactory;

     protected $fillable = ['certificate_type_id','content', 'doctor_id'];


     public function certificate_type(){
        return $this->belongsTo(CertificateType::class);
    }
}
