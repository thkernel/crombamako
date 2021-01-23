<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubscriptionRequest;

class Speciality extends Model
{
    use HasFactory;

    //protected $nullable = ['uid'];
    protected $fillable = ['name','user_id'];

    public function subscription_requests(){
        return $this->hasMany(SubscriptionRequest::class);
    }
}
