@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection

@section('botones')
 <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-uppercase font-weight-bold"> <svg class="icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>Volver</a>
@endsection

@section('content')

<h1 class="text-center">Editar mi perfil</h1>

<div class="row justify-content-center mt-5">
	<div class="col-md-10 bg-white p-3">
		<form action="{{ route('perfiles.update', $perfil->id) }}" enctype="multipart/form-data">
				<div class="form-group">
					<label for="url"> Sitio web</label>
					<input type="text" name="url" class="form-control"  id="url" placeholder="Tu sitio web" value="{{ $perfil->usuario->url}}">
				</div>

			<div class="form-group">
				<label for="name"> Nombre</label>
				<input type="text" name="name" class="form-control"  id="name" placeholder="Tu nombre" value="{{ $perfil->usuario->name }}">
			</div>

			<div class="form-group mt-3">
				<label for="biografia">Biografía</label>
				<input type="text" id="biografia" name="biografia" value="{{ $perfil->biografia }}" hidden="">
				<trix-editor input="biografia"></trix-editor>

				@foreach ($errors->get('biografia') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>

			<div class="form-group mt-3">
				<label for="imagen">Tu imagen</label>
				<input type="file" name="imagen" class="form-control">

				@if($perfil->imagen)
				<div class="mt-4">
					<p>Imagen actual</p>
					<img src="/images/{{ $perfil->imagen}}" style="width: 300px">
				</div>
				@foreach ($errors->get('imagen') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
                @endif
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Actualizar perfil">
				
			</div>
		</form>
			
	</div>
</div>
@endsection

@section('scripts')
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" defer=""></script><!--Defer: Espera que todo el contenido de la página este cargado del html y despues y despúies carga el archivo javascript-->
@endsection