<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Libro;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }/*

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }
    public function index2()
    {
        
            $join = Libro::select('titulo', DB::raw('count(titulo) as total'))
                ->groupBy('titulo')
                ->orderByRaw('total DESC');
            $sql = '(' . $join->toSql() . ') as latest';
            $libros = Libro::rightjoin(DB::raw($sql), function($join) {
                $join->on('libros.titulo', 'latest.titulo');
                    })->where('estado','disponible')->paginate(5);

        return view('home', compact('libros'));
    }
}
