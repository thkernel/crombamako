<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;


	protected $fillable = ['doctor_id', 'year', 'amount', 'user_id'];


	
    
}
