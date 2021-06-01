<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class PostCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];

    public function post(){
        return $this->hasMany(Post::class);
    }


}
