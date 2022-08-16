<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = ['title','content', 'resource_category_id',  'user_id'];

    public function resource_category(){
        return $this->belongsTo(ResourceCategory::class);
    }

    public function attachment()
    {
        return $this->morphOne(EloquentStorageAttachment::class, 'attachable');
    }
}
