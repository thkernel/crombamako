<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PostCategory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['post_category_id','title','content',  'user_id'];

    public function post_category(){
        return $this->belongsTo(PostCategory::class);
    }
}
