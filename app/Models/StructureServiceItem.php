<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructureServiceItem extends Model
{
    use HasFactory;
    
    protected $fillable = ['structure_service_id' , 'service_id'];

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
