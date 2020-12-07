<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'author'
    ];

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function user(){
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'posts_categories', 'post', 'category');
    }

    public function files(){
        return $this->hasMany(PostFile::class, 'post');
    }
}
