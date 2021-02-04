<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['feature_id', 'user_id',  'status'];

    public function permission_items(){
        return $this->hasMany(PermissionItem::class);
    }

    public function feature(){
        return $this->belongsTo(Feature::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
