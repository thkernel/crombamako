<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StructureType;

class Structure extends Model
{
    use HasFactory;
    protected $fillable = ['structure_type_id','name','slogan', "address", "street", "locality", "phone" , "email", "website", "latitude", "longitude", "description", "logo",'user_id'];



    public function structure_type(){
        return $this->belongsTo(StructureType::class);
    }
}
