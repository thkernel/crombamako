<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;
use App\Models\Prestation;

class StructurePrestation extends Model
{
    use HasFactory;
    protected $fillable = ['prestation_id', 'structure_id' , 'status', 'user_id'];


    public function structure(){
        return $this->belongsTo(Structure::class);
    }

    public function prestation(){
        return $this->belongsTo(Prestation::class);
    }

}
