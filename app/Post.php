<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function aLotOfComment()
    {
        return $this->belongsToMany(Comment::class, 'category_post', 'id', 'category');
    }


    public function userData()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }




}
