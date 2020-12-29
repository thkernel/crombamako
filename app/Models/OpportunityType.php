<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Opportunity;

class OpportunityType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function opportunity(){
        return $this->hasMany(Opportunity::class);
    }
}
