<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessLicense extends Model
{
    use HasFactory;

    protected $fillable = ['reference', 'year', 'description' , 'status', 'user_id'];
}
