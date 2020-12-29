<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;

class StructureType extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];

    public function structure(){
        return $this->hasMany(Structure::class);
    }
}
