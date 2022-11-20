<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PagesController extends Controller
{
    public function home()
    {
        /* $posts = Post::latest('published_at')->get();
         return view('welcome', compact('posts'));
         se comentó a partir del video 19*/
         /*query scopes video 19
         $post = Post::WhereNotNull('published_at')
         ->where('published_at', '<=', Carbon::now() )
         ->latest('published_at')
         ->get();
         return view('welcome', compact('posts'));*/

         $posts = Post::published()->get();
         return view('welcome', compact('posts'));

    }
}
