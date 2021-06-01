<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubscriptionRequest;
use App\Models\Neighborhood;


class Town extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'user_id'];

    public function subscription_request(){
        return $this->hasMany(SubscriptionRequest::class);
    }

    public function neighborhood(){
        return $this->belongsTo(Neighborhood::class);
    }

}
