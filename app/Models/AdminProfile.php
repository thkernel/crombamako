<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'civility',
        'first_name',
        'last_name',
        'address',
        'phone',
        'description',
        'status'
       
    ];


    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
    
/*
    public function user() 
      { 
        return $this->morphOne(User::class, 'profile');
      }*/


    public function getFullnameAttribute() {
    	return $this->first_name . ' ' . $this->last_name;
	}

}
