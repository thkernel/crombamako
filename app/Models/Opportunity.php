<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\OpportunityType;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;

class Opportunity extends Model
{
    use HasFactory;
    use Sluggable;
    
        protected $fillable = ['opportunity_type_id','title','content',   'user_id'];


public function opportunity_type(){
        return $this->belongsTo(OpportunityType::class);
    }


    public function attachment()
    {
        return $this->morphOne(EloquentStorageAttachment::class, 'attachable');
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

    

    public function user(){
        return $this->belongsTo(User::class);
    }

}
