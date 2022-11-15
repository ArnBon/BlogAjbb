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
        $cargo = Cargo::all();
        $ubicacion = Ubicacion::all();
        //y asi con las tablas que tengas relacionadas que tengan que ver con especialistas 
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        //return Post::create($request->all());

        $especialista = new Especialista;

        $especialista->title        = $request->get('title');
        $especialista->body         = $request->get('body');
        $especialista->excerpt      = $request->get('excerpt');
        $especialista->published_at = Carbon::parse($request->get('published_at'));
        $especialista->category_id  = $request->get('category');
        
        $especialista->save();

        /* luego de guardar el post 
        vamos a asignarle las etiquetas 
        La relacion ya la tenemos definida */
        $especialista->tags()->attach($request->get('tags'));

        return back()->with('flash', 'El Especialista ha sido creado !!');

    }
}