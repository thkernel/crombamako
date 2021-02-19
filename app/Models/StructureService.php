<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructureService extends Model
{
    use HasFactory;
    protected $fillable = ['structure_id' , 'status', 'user_id'];


    public function structure(){
        return $this->belongsTo(StructureProfile::class, 'structure_id');
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function structure_service_items(){
        return $this->hasMany(StructureServiceItem::class);
    }
}
