<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Receta;
use App\categoria;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Obtener las recetas más nuevas
        /*  latest:obtiene los registros más recientes, 
            oldest:los regsitros más antiguos
            limit y take: son métodos que se obtiene la cantidad que se el especifica como párametro
            Por ejemplo en nuestro enviamos solo 5 por lo que se obtiene solamente 5 registros
        */

        $votadas = Receta::withCount('likes')->orderBy('likes_count','desc')->take(3)->get();
        //Obtener todas las categorias
        $categorias= Categoria::all();

        //Agrupar las recetas por categorias
        $recetas =[];
        foreach($categorias as $categoria){
            //Arreglo bidemensional:es decir un arreglo dentro de otro arreglo
            $recetas[Str::slug($categoria->nombre)][] = Receta::where('categoria_id',$categoria->id)->get();
        }
        $nuevas = Receta::latest()->take(3)->get();
        return view('home', compact('nuevas','recetas','votadas'));
    }
}
