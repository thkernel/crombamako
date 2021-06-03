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
    	'attachable_id', 
        'attachable_type', 
    	'blob_id',
 
    ];



    public function attachable()
    {
        return $this->morphTo();
    }

    

    

    public function blob(){
        return $this->belongsTo(EloquentStorageBlob::class, 'blob_id');
    }
}
