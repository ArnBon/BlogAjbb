<?php

namespace App\Http\Controllers\Admin;


use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    } 
    
    // public function create() comentado en el video 25
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('admin.posts.create', compact('categories', 'tags'));
    // }

    /*creado en el video 24*/
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);
        
        $post = Post::create([
            'title' => $request->get('title'),
            'url' => str_slug($request->get('title')),        
        ]);

        return redirect()->route('admin.posts.edit', $post);

    }
    /*fin del metodo*/

    //video 24
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));        
    }

    /*creado en video 25*/
    public function update(Post $post, Request $request) 
    {
        $this->validate($request, [
            'title'    => 'required',
            'body'     => 'required',
            'category' => 'required',
            'tags'     => 'required',
            'excerpt'  => 'required'
        ]);
        $post->title        = $request->get('title');
        $post->url          = str_slug($request->get('title'));
        $post->body         = $request->get('body');
        $post->excerpt      = $request->get('excerpt');
        $post->published_at = $request->filled('published_at') ? Carbon:: parse($request->get('published_at')) : null;
        $post->category_id  = $request->get('category');
        $post->save();

        // $post->tags()->attach($request->get('tags')); comentado een el video 25
           $post->tags()->sync($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido guardada !!');
    }

    // public function store(Request $request) comentado en el video 24
    // {
    //     $this->validate($request, [
    //         'title'    => 'required',
    //         'body'     => 'required',
    //         'category' => 'required',
    //         'tags'     => 'required',
    //         'excerpt'  => 'required'
    //     ]);

    //     //return Post::create($request->all());

    //     $post = new Post;

    //     $post->title        = $request->get('title');
    //     $post->url          = str_slug($request->get('title'));
    //     $post->body         = $request->get('body');
    //     $post->excerpt      = $request->get('excerpt');
    //     $post->published_at = $request->filled('published_at') ? Carbon:: parse($request->get('published_at')) : null;
    //    //$post->published_at = $request->has('published_at') ? Carbon:: parse($request->get('published_at')) : null; NO SIRVE
    //    //$post->published_at = $request->has('published_at') ? null : Carbon::parse($request->get('published_at')); //NO SIRVE
    //     $post->category_id  = $request->get('category');
    //     $post->save();

    //     /* luego de guardar el post 
    //     vamos a asignarle las etiquetas 
    //     La relacion ya la tenemos definida */
    //     $post->tags()->attach($request->get('tags'));

    //     return back()->with('flash', 'Tu publicación ha sido creada !!');

    // }
}
