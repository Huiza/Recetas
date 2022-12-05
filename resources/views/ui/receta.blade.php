<div class="col-md-4 mt-4">
                            <div class="card shadow">
                                <img class="card-img-top" src="/images/{{ $receta->imagen }}" alt="iamgen receta">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $receta->titulo }}</h3>
                                    <div class="meta-receta d-flex justify-content-between">
                                        @php
                                            $fecha =$receta->create_at
                                        @endphp
                                        <p class="text-primary fecha font-weight-bold"></p>

                                        <fecha-receta fecha="{{ $fecha }}"></fecha-receta>

                                        <p>{{ count($receta->likes) }} Les gustó</p>
                                    </div>

                                    <p class="card-text">
                                        {{ Str::words(strip_tags($receta->preparacion),20,'...') }}
                                        <a href="{{ route('recetas.show', $receta->id) }}" class="btn btn-primary d-block btn-Rrceta">Ver receta
                                        </a>
                                    </p>
                                </div>
                            </div>
                            
                        </div>