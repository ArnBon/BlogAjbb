<?php

namespace App\Http\Controllers\Admin;

use App\Especialista;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EspecialistaController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $especialistas = Especialista::all();
         $equipos = Equipo::all();
         return view('especialista.index', compact('especialistas', 'equipos'));        
    }    
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        //return Post::create($request->all());

        $post = new Post;

        $post->title        = $request->get('title');
        $post->body         = $request->get('body');
        $post->excerpt      = $request->get('excerpt');
        $post->published_at = Carbon::parse($request->get('published_at'));
        $post->category_id  = $request->get('category');
        $post->save();

        /* luego de guardar el post 
        vamos a asignarle las etiquetas 
        La relacion ya la tenemos definida */
        $post->tags()->attach($request->get('tags'));

        return back()->with('flash', 'Tu publicación ha sido creada !!');

    }
}