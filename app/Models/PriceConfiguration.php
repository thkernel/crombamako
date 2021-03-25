<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceConfiguration extends Model
{
    use HasFactory;
    protected $fillable = ['contribution_amount',  'user_id'];
}
