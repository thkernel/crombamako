<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EloquentStorageAttachment;

class EloquentStorageBlob extends Model
{
    use HasFactory;

    protected $fillable = [
    	'key',
    	'filename',
    	'content_type', 
    	'metadata', 
    	'byte_size',
    	'checksum'
    ];


    public function eloquent_storage_attachment(){
        return $this->hasMany(EloquentStorageAttachment::class);
    }
}
