<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = ['title','content',  'user_id'];

    public function attachment()
    {
        return $this->morphOne(EloquentStorageAttachment::class, 'attachable');
    }
}
