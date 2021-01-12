<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'last_name',
        'locality_id',
        'speciality_id',
        'civility',
        'address',
       
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getFullnameAttribute() {
    	return $this->first_name . ' ' . $this->last_name;
	}
}
