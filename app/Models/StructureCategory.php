<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Structure;


class StructureCategory extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['name', 'user_id'];





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

    public function structures(){
        return $this->hasMany(Structure::class);
    }
}
