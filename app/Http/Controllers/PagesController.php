<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PagesController extends Controller
{
    public function home()
    {
         // $posts = Post::whereNotNull('published_at')
        //                    ->where ('published_at', '<=', Carbon::now() )
        //                    ->latest('published_at')
        //                    ->get();
        // return view('welcome', compact('posts'));//  queda comentado a partir del video 19

        //quedando asi:
        $posts = Post::published()->get();
        return view('welcome', compact('posts'));
    }
}
