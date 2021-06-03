<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Role extends Model
{
   
    //protected $nullable = ['uid'];
    protected $fillable = ['name'];

    public function user(){
        return $this->hasMany(User::class);
    }
}
