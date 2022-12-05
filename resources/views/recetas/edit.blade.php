@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection

@section('botones')
 <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection

@section('content')
<h2 class="text-center mb-5">Editar receta {{ $receta->titulo }}</h2>
<div class="row justify-content-center mb-5">
	<div class="col-md-8">
		<form method="POST" action="{{route('recetas.update', $receta->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="titulo"> Titulo Receta</label>
				<input type="text" name="titulo" class="form-control"  id="titulo" placeholder="Titulo Receta" value="{{ $receta->titulo }}">
				@foreach ($errors->get('titulo') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>

			<div class="form-group">
				<label for="categoria_id">Categoria</label>
				<select name="categoria_id" class="form-control"  id="categoria_id">
					<option>--Seleccione categoría--</option>
					@foreach($categorias as $categoria)
					<option value="{{ $categoria->id }}"{{ $receta->categoria_id==$categoria->id? 'selected':'' }}>{{$categoria->nombre}}</option>
					@endforeach
				</select>

				@foreach ($errors->get('categoria_id') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>

			<div class="form-group mt-3">
				<label for="preparacion">Preparación</label>
				<input type="hidden" id="preparacion" name="preparacion" value="{{ $receta->preparacion }}">
				<trix-editor input="preparacion"></trix-editor>

				@foreach ($errors->get('preparacion') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>

			<div class="form-group mt-3">
				<label for="ingredientes">Ingredientes</label>
				<input type="hidden" id="ingredientes" name="ingredientes" value="{{ $receta->ingredientes }}">
				<trix-editor input="ingredientes"></trix-editor>

				@foreach ($errors->get('ingredientes') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>

			<div class="form-group mt-3">
				<label for="imagen">Elige la imagen</label>
				<input type="file" name="imagen" class="form-control">

				<div class="mt-4">
					<p>Imagen actual</p>
					<img src="/images/{{ $receta->imagen}}" style="width: 300px">
				</div>
				@foreach ($errors->get('imagen') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Actualizar receta">
				
			</div>
		</form>
		
	</div>
</div>
@endsection

@section('scripts')
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" defer=""></script><!--Defer: Espera que todo el contenido de la página este cargado del html y despues y despúies carga el archivo javascript-->
@endsection