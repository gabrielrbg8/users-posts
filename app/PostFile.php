<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostFile extends Model
{
    protected $table = 'posts_files';
    public function post(){
        return $this->belongsTo(Post::class, 'post', 'id');
    }
}
