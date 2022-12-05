@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection

@section('botones')
 <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-uppercase font-weight-bold"> <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>Volver</a>
@endsection

@section('content')
<h2 class="text-center mb-5">Crear nueva receta</h2>
<div class="row justify-content-center mb-5">
	<div class="col-md-8">
		<form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="titulo"> Titulo Receta</label>
				<input type="text" name="titulo" class="form-control"  id="titulo" placeholder="Titulo Receta" value={{ old('titulo') }}>
				@foreach ($errors->get('titulo') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>

			<div class="form-group">
				<label for="categoria_id">Categoria</label>
				<select name="categoria_id" class="form-control"  id="categoria_id">
					<option>--Seleccione categoría--</option>
					@foreach($categorias as $categoria)
					<option value="{{ $categoria->id }}"{{ old('categoria_id')==$categoria->id? 'selected':'' }}>{{$categoria->nombre}}</option>
					@endforeach
				</select>

				@foreach ($errors->get('categoria_id') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>

			<div class="form-group mt-3">
				<label for="preparacion">Preparación</label>
				<input type="text" id="preparacion" name="preparacion" value="{{ old('preparacion') }}" hidden="">
				<trix-editor input="preparacion"></trix-editor>

				@foreach ($errors->get('preparacion') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>

			<div class="form-group mt-3">
				<label for="ingredientes">Ingredientes</label>
				<input type="text" id="ingredientes" name="ingredientes" value="{{ old('ingredientes') }}" hidden="">
				<trix-editor input="ingredientes"></trix-editor>

				@foreach ($errors->get('ingredientes') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>

			<div class="form-group mt-3">
				<label for="imagen">Elige la imagen</label>
				<input type="file" name="imagen" class="form-control" id="imagen">

				@foreach ($errors->get('imagen') as $mensaje)
                          <small style="color:#B42020;">{{ $mensaje }}</small>
                @endforeach
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Agregar receta">
				
			</div>
		</form>
		
	</div>
</div>
@endsection

@section('scripts')
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" defer=""></script><!--Defer: Espera que todo el contenido de la página este cargado del html y despues y despúies carga el archivo javascript-->
@endsection