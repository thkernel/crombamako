<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessLicense extends Model
{
    use HasFactory;

    protected $fillable = ['reference', 'year', 'description' , 'status', 'doctor_id'];


    public function doctor(){
        return $this->belongsTo(DoctorProfile::class, 'doctor_id');
    }

    public function attachment()
    {
        return $this->morphOne(EloquentStorageAttachment::class, 'attachable');
    }
}
