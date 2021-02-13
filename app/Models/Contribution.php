<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;


	protected $fillable = ['doctor_id', 'total_amount','user_id'];


	
    public function contribution_items(){
        return $this->hasMany(ContributionItem::class);
    }

    public function doctor(){
        return $this->belongsTo(DoctorProfile::class, 'doctor_id');
    }
}
