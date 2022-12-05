<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Receta;
use Illuminate\Http\Request;
use App\Http\Requests\EditarPerfiRequest;

class PerfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>'show']);
    } 
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //Obtener las recetas con paginación
        $recetas = Receta::where('user_id', $perfil->user_id)->paginate(10);

         return view('perfiles.show', compact('perfil','recetas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
        $this->authorize('view',$perfil);
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(EditarPerfilRequest $request, Perfil $perfil)
    {
        //
        $this->authorize('update',$perfil);
        //Si el usuario sube una imagen 
        $perfil->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $perfil->imagen=$name;
        }
        //Asignar nombre y URL
        
        auth()->user()->url=$request->url;
        auth()->user()->name=$request->name;

        //Asignar biografía e imagen
       auth()->user()->perfil()->biografia=$request->biografia;
        auth()->user()->perfil()->save();
        auth()->user()->save();

        return  redirect()->route('recetas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
