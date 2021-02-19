<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructurePrestationItem extends Model
{
    use HasFactory;
    protected $fillable = ['structure_prestation_id' , 'prestation_id'];
}
