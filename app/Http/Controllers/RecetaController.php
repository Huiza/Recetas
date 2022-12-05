<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;
use App\Http\Requests\RecetaRequest;
use DB;

use Auth;
use App\categoria;

class RecetaController extends Controller
{
    public function __construct(){
        //Contructor q permite pra crear recetas para usuario autenticados
        $this->middleware('auth',['except'=>'show']);//Excepcion: El método show se puede visualizar para usuarios no autenticados

        //Middeleware protege las rutas 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$usuario = auth()->user();
       // $recetas = Auth::user()->recetas;
        //Mostrar las recetas por cantidad de votos
        #$votadas = Receta::has()'likes','>',0)-<get();

        $usuario = auth()->user();
        //Una forma de mostrar los listado de me gusta de las redcetas del usuario autenticados
        auth()->user()->meGusta;
        $recetas = Receta::where('user_id',$usuario->id)->paginate(10);

        return view('recetas.index', compact('recetas','usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = categoria::all();
        return view('recetas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecetaRequest $request)
    {
        $receta = new Receta();   
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $receta->imagen=$name;
        }
        $receta->titulo = $request->titulo;
        $receta->categoria_id = $request->categoria_id;
        $receta->preparacion = $request->preparacion;
        $receta->ingredientes = $request->ingredientes;
        $receta->user_id = Auth::user()->id;
        $receta->save();

        return  redirect()->route('recetas.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //Obtener si el usuario actual le gusta la receta y está autenticado
        $like=(auth()->user())?auth()->user()->meGusta->contains($receta->id) :false;

        //Pasa la cantidad de likes ala vista
        $likes=$receta->likes()->count();

        return view('recetas.show',compact('receta','like','likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
        $this->authorize('view',$receta);
        $categorias = categoria::all();
        return view('recetas.edit', compact('categorias','receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
        $this->authorize('update',$receta);
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $receta->imagen=$name;
        }

        $receta->titulo = $request->input('titulo');
        $receta->categoria_id = $request->get('categoria_id');
        $receta->preparacion = $request->input('preparacion');
        $receta->ingredientes = $request->input('ingredientes');
        
        $receta->user_id = Auth::user()->id;
        $receta->save();

        return  redirect()->route('recetas.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //Ejecutar el policy
        $this->authorize('delete',$receta);
        $receta->delete();
        return redirect()->route('recetas.index');
}
}