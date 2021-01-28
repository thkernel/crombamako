<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\DocumentRequest;


class DocumentType extends Model
{
    use HasFactory;

     use Sluggable;

    protected $fillable = ['name', 'user_id'];




    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function document_request(){
        return $this->hasMany(DocumentRequest::class);
    }
}
