<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($id)
    {
       // return $id;
       // return view('posts.show');

       $post = Post::find($id);
       return view('posts.show', compact('post'));
    }
}
