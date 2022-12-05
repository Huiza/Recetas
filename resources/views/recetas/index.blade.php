@extends('layouts.app')

@section('botones')
 @include('ui.navegacion')
@endsection

@section('content')
<h2 class="text-center mb-5">Administra tus recetas</h2>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Título</th>
				<th scole="col">Categoría</th>
				<th scole="col">Acciones</th>
			</tr>
		</thead>

		<tbody>
			@foreach($recetas as $receta)
			<tr>
				<td>{{ $receta->titulo }}</td>
				<td>{{ $receta->categoria->nombre}}</td>
				<td>
					<a href="{{route('recetas.edit', $receta->id) }}" class="btn btn-dark mr-1"><svg class="icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>Editar</a>
					<a href="{{route('recetas.show', $receta->id) }}" class="btn btn-success mr-1"><svg class="icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>Ver</a>
					<form action="{{ route('recetas.destroy',$receta->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<input type="submit" class="btn btn-danger mr-1 d-block" value="Eliminar &times;">
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $recetas->links() }}

	<h2 class="text-center my-5">Recetas que te gustan</h2>
	<div class="col-md-10 mx-auto bg-white p-3">
		@if(count($usuario->meGusta)>0)
		<ul class="list-group">
			@foreach($usuario->meGusta as $receta)
				<li class="list-group-item d-flex justify-content-between align-item-center">
					<p>{{ $recfeta->titulo }}</p>
					<a class="btn-outline-success text-uppercase- font-weight-bold" href="{{ route('$recetas.show',$receta->id)}}">Ver	</a>
			@endforeach
		</ul>
		@else
			<a class="text-center">Aún no tien es rectas guardadas <small>Dale me gusta a las recetas y aparecerán aquí</small></a>
		@endif
	</div>
</div>
@endsection