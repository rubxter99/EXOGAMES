@extends('layouts.tienda')
@section('tienda-content')
<main id="main-tienda">
    <div id="slide-tienda" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#tienda" data-slide-to="0" class="active"></li>
            <li data-target="#tienda" data-slide-to="1"></li>
            <li data-target="#tienda" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/usuarios/slider/tienda/slider-1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/usuarios/slider/tienda/slider-2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/usuarios/slider/tienda/slider-3.jpg" alt="Third slide">
            </div>
        </div>

        <div class="contenido">
            <div class="col-md-6 col-lg-6 titulo">
                <h1>TIENDA</h1>
            </div>
            <div class="col-md-6 col-lg-6  parrafo">
                <p>La mejor selección de nuestros productos a tu alcance con la posibilidad de poder emular tus juegos preferidos.Disfruta de nuestra seleccion desde cualquier plataforma</p>
            </div>
        </div>

    </div>
    @if(Session::has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="categorias">
        @foreach($categorias as $cat)
        {!! Form::open(array('url'=>'tienda','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
        <input type="hidden" name="tipo" value="{{strtolower($cat->nombre)}}">
        <div class="cat">
            <div class="img">
                <button type="submit">
                    <img src="{{asset('img/categorias/'.$cat->imagen)}}">
                </button>
            </div>
            <div class="txt">
                <h3>{{$cat->nombre}}</h3>
            </div>
        </div>
        {{Form::close()}}
        @endforeach
    </div>

    <div class="destacados">
        <div class="titulo">
            <h2>DESTACADOS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($destacados as $des)
                    <div class="item">
                        <div class="card">


                            <a href="{{route('individual',$des->nombre)}}">
                                <img src="{{asset('img/productos/'.$des->imagen)}}">
                            </a>

                            <div class="card-body">
                                <h5>{{$des->nombre}}</h5>
                                <?php $rating1 = number_format($des->valoracion);  ?>
                                @for($i=1;$i<=$rating1;$i++) <span class="bistar" value="5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path fill="yellow" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    </span>
                                    @endfor
                                    @for($j=$rating1+1;$j<=5;$j++) <span class="bistar" value="5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        </span>
                                        @endfor
                                        <h5>{{$des->precio}} €</h5>
                                        @if (Auth::check())
                                        @if ($des->stock == 0)
                                      

                                        <p style="padding-top:20px; color:orange;"><b>No disponible</b></p>
                                        @else
                                        <form action="{{route('agregar.carrito')}}" method="POST">
                                            @csrf

                                            <input type="hidden" value="{{$des->id}}" name="idProducto">
                                            <input type="hidden" value="1" name="cantidad">
                                            <button class="btn btn-primary" title="Agregar al carrito" style="cursor: pointer">
                                                COMPRAR
                                            </button>

                                        </form>
                                        @endif
                                        @else
                                       
                                        

                                        <p style="padding-top:20px; color:orange;"><b>Debe iniciar sesion para comprar.</b></p>
                                        @endif
                            </div>

                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="nuevos">
        <div class="titulo">
            <h2>NUEVOS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($nuevos as $new)
                    <div class="item">
                        <div class="card">


                            <a href="{{route('individual',$new->nombre)}}">
                                <img src="{{asset('img/productos/'.$new->imagen)}}">
                            </a>

                            <div class="card-body">
                                <h5>{{$new->nombre}}</h5>
                                <?php $rating2 = number_format($new->valoracion);  ?>
                                @for($i=1;$i<=$rating2;$i++) <span class="bistar" value="5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path fill="yellow" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    </span>
                                    @endfor
                                    @for($j=$rating2+1;$j<=5;$j++) <span class="bistar" value="5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        </span>
                                        @endfor
                                        <h5>{{$new->precio}} €</h5>
                                        @if (Auth::check())
                                        @if ($new->stock == 0)
                                     

                                        <p style="padding-top:20px; color:orange;"><b>No disponible</b></p>
                                        @else
                                        <form action="{{route('agregar.carrito')}}" method="POST">
                                            @csrf

                                            <input type="hidden" value="{{$new->id}}" name="idProducto">
                                            <input type="hidden" value="1" name="cantidad">
                                            <button class="btn btn-primary" title="Agregar al carrito" style="cursor: pointer">
                                                COMPRAR
                                            </button>

                                        </form>
                                        @endif
                                        @else
                                       
                                      

                                        <p style="padding-top:20px; color:orange;"><b>Debe iniciar sesion para comprar.</b></p>
                                        @endif
                            </div>

                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="emulables">
        <div class="titulo">
            <h2>DEMOSTRACION</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($demos as $dem)
                    <div class="item">
                        <div class="card">


                            <a href="{{route('individual',$dem->nombre)}}">
                                <img src="{{asset('img/productos/'.$dem->imagen)}}">
                            </a>

                            <div class="card-body">
                                <h5>{{$dem->nombre}}</h5>

                                <?php $rating3 = number_format($dem->valoracion);  ?>
                                @for($i=1;$i<=$rating3;$i++) <span class="bistar" value="5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path fill="yellow" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    </span>
                                    @endfor
                                    @for($j=$rating3+1;$j<=5;$j++) <span class="bistar" value="5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        </span>
                                        @endfor


                                        <h5>{{$dem->precio}} €</h5>
                                        @if (Auth::check())
                                        @if ($dem->stock == 0)
                                    

                                        <p style="padding-top:20px; color:orange;"><b>No disponible</b></p>
                                        @else
                                        <form action="{{route('agregar.carrito')}}" method="POST">
                                            @csrf

                                            <input type="hidden" value="{{$dem->id}}" name="idProducto">
                                            <input type="hidden" value="1" name="cantidad">
                                            <button class="btn btn-primary" title="Agregar al carrito" style="cursor: pointer">
                                                COMPRAR
                                            </button>

                                        </form>
                                        @endif
                                        @else
                                      

                                        <p style="padding-top:20px; color:orange;"><b>Debe iniciar sesion para comprar.</b></p>
                                        @endif

                            </div>

                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="todos">
        <div class="titulo">
            <h2>TODOS</h2>
        </div>
        <div class="buscar">
            {!! Form::open(array('url'=>'tienda','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Buscar producto" name="buscar" value="{{$buscar}}">
                <div class="input-group-addon">
                    <button class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                    <a href="{{route('tienda')}}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                        </svg></a>
                </div>
            </div>
            {{Form::close()}}
        </div>
        <div class="container">
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($productos as $pro)

                    <div class="item">
                        <div class="card">



                            <img src="{{asset('img/productos/'.$pro->imagen)}}">


                            <div class="card-body">
                                <a href="{{route('individual',$pro->nombre)}}">
                                    <h5>{{$pro->nombre}}</h5>
                                </a>
                                <?php $rating4 = number_format($pro->valoracion);  ?>
                                @for($i=1;$i<=$rating4;$i++) <span class="bistar" value="5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path fill="yellow" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                    </span>
                                    @endfor
                                    @for($j=$rating4+1;$j<=5;$j++) <span class="bistar" value="5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                        </svg>
                                        </span>
                                        @endfor
                                        <h5>{{$pro->precio}} €</h5>
                                        @if (Auth::check())
                                        @if ($pro->stock == 0)
                                     

                                        <p style="padding-top:20px; color:orange;"><b>No disponible</b></p>
                                        @else
                                        <form action="{{route('agregar.carrito')}}" method="POST">
                                            @csrf

                                            <input type="hidden" value="{{$pro->id}}" name="idProducto">
                                            <input type="hidden" value="1" name="cantidad">
                                            <button class="btn btn-primary" title="Agregar al carrito" style="cursor: pointer">
                                                COMPRAR
                                            </button>

                                        </form>
                                        @endif
                                        @else
                                      

                                        <p style="padding-top:20px; color:orange;"><b>Debe iniciar sesion para comprar.</b></p>
                                        @endif
                            </div>

                        </div>

                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

</main>
@push('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,

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