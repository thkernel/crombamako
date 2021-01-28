<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Town;
use App\Models\SubscriptionRequest;

class Neighborhood extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status','town_id', 'user_id'];

    public function town(){
        return $this->belongsTo(Town::class);
    }

    public function subscription_request(){
        return $this->hasMany(SubscriptionRequest::class);
    }


}
