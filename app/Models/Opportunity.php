<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\OpportunityType;
use Cviebrock\EloquentSluggable\Sluggable;

class Opportunity extends Model
{
    use HasFactory;
    use Sluggable;
    
        protected $fillable = ['opportunity_type_id','title','content', 'thumbnail',  'user_id'];


public function opportunity_type(){
        return $this->belongsTo(OpportunityType::class);
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
                'source' => 'title'
            ]
        ];
    }

}
