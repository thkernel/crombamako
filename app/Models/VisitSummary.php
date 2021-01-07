<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EloquentStorageAttachment;
use App\Models\Structure;

class VisitSummary extends Model
{
    use HasFactory;

    protected $fillable = ['structure_id', 'content','user_id'];

    public function structure(){
        return $this->belongsTo(Structure::class);
    }

    public function eloquent_storage_attachment()
    {
        return $this->morphMany(EloquentStorageAttachment::class, 'attachable');
    }
}
