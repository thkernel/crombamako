<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];

    public function resource(){
        return $this->hasMany(Resource::class);
    }
}
