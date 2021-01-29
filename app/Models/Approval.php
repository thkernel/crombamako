<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $fillable = ['reference', 'year', 'description' , 'status', 'doctor_id'];

    public function doctor(){
        return $this->belongsTo(User::class);
    }
}
