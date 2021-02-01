<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorOrder extends Model
{
    use HasFactory;
    protected $fillable = ['reference', 'doctor_id', 'year', 'status', 'user_id'];

    public function doctor_profile(){
        return $this->belongsTo(DoctorProfile::class);
    }
}
