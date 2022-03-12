<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionItem extends Model
{
    use HasFactory;
    protected $fillable = ['permission_id', 'action_name',  'status'];

    public function permission(){
        return $this->belongsTo(Permission::class);
    }
}
