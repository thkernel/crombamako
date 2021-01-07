<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EloquentStorageBlob;

class EloquentStorageAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
    	'key',
    	'name',
    	'attachable_id', 
    	'attachable_id', 
    	'blob_id',
 
    ];



    public function attachable()
    {
        return $this->morphTo();
    }

    public function eloquent_storage_blob(){
        return $this->belongsTo(EloquentStorageBlob::class);
    }
}
