<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //
    public $timestamps = false;


    public function aLotOfPost()
    {
        return $this->belongsToMany(Post::class, 'category_post', 'id', 'blog');
    }


}
