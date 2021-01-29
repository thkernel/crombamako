<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructureService extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'structure_id' , 'status', 'user_id'];
}
