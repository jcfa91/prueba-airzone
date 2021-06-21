<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function comment()
    {
        return $this->hasMany(Comment::class);
    }


    public function user()
    {
        return $this->hasMany(User::class);
    }




}
