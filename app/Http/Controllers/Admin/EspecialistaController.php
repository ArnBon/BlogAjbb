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
}