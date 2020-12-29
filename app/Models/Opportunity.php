<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\OpportunityType;

class Opportunity extends Model
{
    use HasFactory;
        protected $fillable = ['opportunity_type_id','title','content',  'user_id'];


public function opportunity_type(){
        return $this->belongsTo(OpportunityType::class);
    }

}
