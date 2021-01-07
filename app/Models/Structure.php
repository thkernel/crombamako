<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StructureType;
use App\Models\VisitSummary;

class Structure extends Model
{
    use HasFactory;
    protected $fillable = ['structure_type_id','structure_category_id','name','slogan', "address", "street", "locality_id", "phone" , "email", "website", "latitude", "longitude", "description", "logo",'user_id'];



    public function structure_type(){
        return $this->belongsTo(StructureType::class);
    }

     public function visit_summary(){
        return $this->hasMany(VisitSummary::class);
    }
}
