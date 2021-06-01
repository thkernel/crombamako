<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StructureProfile;
use App\Models\Prestation;

class StructurePrestation extends Model
{
    use HasFactory;
    protected $fillable = ['structure_id' , 'status', 'user_id'];


    public function structure(){
        return $this->belongsTo(StructureProfile::class, 'structure_id');
    }

    public function prestation(){
        return $this->belongsTo(Prestation::class);
    }

    public function structure_prestation_items(){
        return $this->hasMany(StructurePrestationItem::class);
    }

}
