<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubscriptionRequest;


class Locality extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'user_id'];

    public function subscription_request(){
        return $this->hasMany(SubscriptionRequest::class);
    }
}
