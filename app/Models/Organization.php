<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
     protected $fillable = ['name','address', 'phone_1','phone_2', 'city', 'country', 'email','fax', 'po_box', 'website','latitude', 'longitude',  'user_id'];
}
