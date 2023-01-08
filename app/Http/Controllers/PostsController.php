<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{ /*Query scopes
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    } */
    /**Model bindings */
     public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    } 
}
