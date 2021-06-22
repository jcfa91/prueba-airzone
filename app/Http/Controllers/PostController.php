<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function getPostRelations($id)
    {
        $body = array('body' => array());
        try {
            $post = Post::find($id);
            $body['body'] = array(
              'post' => array(
                  'id' => $post->id,
                  'title' => $post->title,
                  'short_conteng' => null,
                  'users' => array($post->userData->toArray()),
                  'comments' => array($post->aLotOfComment->toArray()[0])
              )
            );
            $status = 200;
        } catch (exception $e) {
            $body['body']= array('post' => 'error', 'msg' => $e->getMessage());
            $status = 500;
        }
        return response()->json($body, $status);
    }
}
