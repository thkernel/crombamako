<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;
use Cviebrock\EloquentSluggable\Sluggable;

class StructureType extends Model
{
    
    use Sluggable;

    protected $fillable = ['name', 'user_id'];

    public function structure(){
        return $this->hasMany(Structure::class);
    }




    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
