<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorOrder extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id', 'year', 'amount', 'status', 'user_id'];
}
