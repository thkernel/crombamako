<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EloquentStorageBlob;

class EloquentStorageAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name',
    	'attachmentable_id', 
        'attachmentable_type', 
    	'eloquent_storage_blob_id',
 
    ];



    public function attachmentable()
    {
        return $this->morphTo();
    }

    

    

    public function eloquent_storage_blob(){
        return $this->belongsTo(EloquentStorageBlob::class);
    }
}
