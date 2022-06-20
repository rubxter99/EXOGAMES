@extends('layouts.tienda')
@section('tienda-content')
<main id="main-individual">
    <div class="contenido-general">
        <div class="contenido-1">
            <div class="imagen">
                <img src="{{asset('img/productos/'.$individual->imagen)}}" alt="">
            </div>
            <div class="texto">
                <div class=titulo>
                    <h1>{{$individual->nombre}}</h1>
                    <h2>{{$individual->precio}} €</h2>
                </div>
                <div class="parrafo">
                    <p>{{$individual->descripcion}}</p>
                </div>

            </div>
        </div>
        <div class="contenido-2">
            <div class="izquierda">
                <div class="valoracion">
                    <?php $rating = number_format($individual->valoracion);  ?>
                    @for($i=1;$i<=$rating;$i++) <span class="bistar" value="5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path fill="yellow" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        </span>
                        @endfor
                        @for($j=$rating+1;$j<=5;$j++) <span class="bistar" value="5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            </span>
                            @endfor
                </div>
                <div class="imagenes">
                    @foreach ($imagenes as $img)
                    <img src="{{asset('img/galeria/'.$img->imagen)}}" alt="">
                    @endforeach
                </div>
            </div>
            <div class="derecha">
            <?php $trailer = htmlentities($individual->trailer);
            echo html_entity_decode($trailer); ?>
            
            </div>
        </div>
        <div class="contenido-3">
            <div class="categoria">
                <h3>

                    {{$categorias->nombre}}

                </h3>

            </div>
            <div class="fecha">
                <h3> {{$individual->fecha}}</h3>

            </div>
            <div class="genero">
                <h3>{{$individual->genero}}</h3>

            </div>
            <div class="stock">
                <h3>{{$individual->stock}} Unidades</h3>


                @if ($individual->stock < 5) <p><b>Quedan pocas unidades!</b></p>
                    @endif
                @if ($individual->stock == 0) <p><b>No hay unidades!</b></p>
                @endif
            </div>
        </div>

    </div>
    <div class="contenido-final">
        <div class="frame">

            <?php $demo = htmlentities($individual->demo);
            echo html_entity_decode($demo); ?>
        </div>
        <div class="botones">
            @if (Auth::check())
            @if ($individual->stock != 0)

            

            <form action="{{route('agregar.carrito')}}" method="POST">
                @csrf

                <input type="hidden" value="{{$individual->id}}" name="idProducto">
                <input type="hidden" value="1" name="cantidad">
                <button type="submit" class="paction add-cart" title="Agregar al carrito" style="cursor: pointer">
                    <span>COMPRAR</span>
                </button>

                @if (Session::has('danger'))
                <p style="color:#ff5579">{{Session::get('danger')}}</p>
                @endif
                @if (Session::has('success'))
                <p style="color:#232f3e "><b>{{Session::get('success')}}</b></p>
                @endif

            </form>
            @else
            <p><b>No disponible</b></p>
            @endif
            @else

            <button class="paction add-cart" title="Agregar al carrito" style="cursor: pointer">
                <span>COMPRAR</span>
            </button>

            <p><b>Debe iniciar sesion para comprar.</b></p>


            @endif

        </div>
    </div>



</main>
@push('scripts')
<script>
    setTimeout(function() {
        $('.frame iframe').fadeOut(1000);
        console.log($(this));
    }, 18000000);

    $('.featured-carousel').owlCarousel({
        loop: false,
        autoplay: true,
        margin: 30,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        nav: true,
        dots: false,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
</script>
@endpush
@endsection