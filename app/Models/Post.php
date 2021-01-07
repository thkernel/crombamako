<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PostCategory;
use App\Models\EloquentStorageAttachment;
use Cviebrock\EloquentSluggable\Sluggable;

//require __DIR__.'/_EloquentSluggable.php';

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['post_category_id','title','content', 'thumbnail', 'user_id'];

    public function post_category(){
        return $this->belongsTo(PostCategory::class);
    }


    public function eloquent_storage_attachment()
    {
        return $this->morphMany(EloquentStorageAttachment::class, 'attachable');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }




}
