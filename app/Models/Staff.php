<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Speciality;
use App\Models\Service;
use App\Models\Structure;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = ['civility', 'first_name', 'last_name', 'speciality_id', 'structure_id', 'service_id', 'description', 'user_id'];

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
    public function structure(){
        return $this->belongsTo(Structure::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
