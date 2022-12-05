@extends('layouts.app')

@section('content')

@section('botones')
 <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-uppercase font-weight-bold"> <svg class="icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>Volver</a>
@endsection

<div class="container">
	<div class="row">
	 <div class="col-md-5">
	 	@if($perfil->imagen)
	 	<img src="/images/{{ $perfil->imagen}}" class="w-50 rounded-circle" alt="imagen chef">
	 	@endif 	
	 </div>

	 <div class="col-md-7 mt-5 mt-md-0">
	 	<h2 class="text-center mb-2 text primary">{{ $perfil->usuario->name }}</h2>
	 	<a href="{{ $perfil->usuario->url }}">Visitar sitio web</a>
	 	<div class="biografia">
	 		{{ !! $perfil->biografia }}
	 	</div>
	 </div>	

	</div>
</div>

<h2 class="text-center my-5">Recetas creadas por:{{ $perfil->usuario->name }}</h2>

<div class="container">
	<div class="row mx-auto bg-white p-4">
		@if(count($recetas)>0))
			@foreach($recetas as $receta)
				<div class="col-md-4 mb-4">
					<div class="card">
						<img src="/images/{{ $receta->imagen }}" class="card-img-top" alt="imagen receta">
						<div class="card-body">
							<h3>{{ $receta->titulo }}</h3>
							<a href="{{ route('recetas.show',$receta->id) }}" class="btn-primary d-block mt-4 text uppercase  font-weight-bold"></a>
						</div>
					</div>
				</div>
			@endforeach
		@else
			<p class="text-centerw-100">No hay recetas aún...</p>
		@endif
	</div>

	<div class="d-flex justify-content-center">
		{{ $recetas->links() }}
	</div>
</div>
@endsection