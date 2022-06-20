@extends('layouts.general')
@section('general-content')
<main class="main-carrito">
    @if (Session::has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{Session::get('danger')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="productos">
        @if (count($carrito)>0)

        @foreach ($carrito as $det)
        <div class="producto">
      
            <div class="izquierda">
                <a href="{{route('individual',$det->idProducto)}}" class="product-image">
                    <img src="{{asset('img/productos/'.$det->imagen)}}" alt="product">
                </a>
            </div>
            <div class="centro">
                <div class="titulo">
                    <h3> {{$det->nombre}}</h3>
                </div>
                <div class="descripcion">
                    <p>{{$det->descripcion}}</p>
                </div>
                <div class="categoria">
                    <h4>{{$det->categoria}}</h4>
                </div>
            </div>
            <div class="derecha">
                <div class="precio">
                    <h3> {{$det->precio}}€</h3>
                </div>
                <div class="edicion">
                    <div class="eliminar">
                        <form action="{{route('quitar.carrito',$det->id)}}" method="POST" style="margin-bottom: 0px !important; cursor:pointer">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" title="" style="border: none !important;
                                                background: none !important;" class="btn-remove"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg></button>
                        </form>

                    </div>
                    <div class="modificar">
                        @if( $det->stock > $det->cantidad )
                        <form action="{{route('reducir.carrito',$det->id)}}" method="POST" style="margin-bottom: 0px !important; cursor:pointer">
                            @csrf
                            <input name="idProducto" type="hidden" value="{{$det->idProducto}}">
                            <input name="pcantidad" type="hidden"  value="{{$det->cantidad}}" data-max="99" pattern="[0-9]*">
                            <button class="btn btn-reduce" type="submit">
                                -
                            </button>
                        </form>
                        <input name="pcantidad" type="text" value="{{$det->cantidad}}" data-max="99"  readonly pattern="[0-9]*">
                        <form action="{{route('aumentar.carrito',$det->id)}}" method="POST" style="margin-bottom: 0px !important; cursor:pointer">
                            @csrf
                            <input name="idProducto" type="hidden" value="{{$det->idProducto}}">
                            <input name="pcantidad" type="hidden" value="{{$det->cantidad}}" data-max="99" pattern="[0-9]*">
                            <button class="btn btn-reduce" type="submit">
                                +
                            </button>
                        </form>
                        @else
                            <h4>Fuera de stock</h4>
                        @endif
                    </div>
                </div>
                <div class="fecha">
                    <h4>{{$det->fecha}}</h4>
                </div>
            </div>
        </div>

        @endforeach
        @else
        <h3 class="texto-vacio" style="font-weight: 300">Tu carrito esta vacio.</h3>
        @endif

    </div>


    <div class="ofertas">
        <div class="ofert primera">
            <img src="{{asset('img/usuarios/banners/banner-3.jpg')}}">
        </div>
        <div class="ofert segunda">
            <img src="{{asset('img/usuarios/banners/banner-6.jpg')}}">
        </div>
        <div class="ofert tercera">
            <img src="{{asset('img/usuarios/banners/banner-7.jpeg')}}">
        </div>
        <div class="ofert cuarta">
            <img src="{{asset('img/usuarios/banners/banner-5.jpg')}}">
        </div>
    </div>
    <div class="contenido-total">
        <div class="resumen">
            <div class="cantidad">
                <h3>CANTIDAD</h3>
                <div class="numero">
                    {{$suma}}
                </div>
            </div>
            <div class="subtotal">
                <h3>SUBTOTAL</h3>
                <div class="numero">
                    {{$total}}€
                </div>
            </div>
        </div>
        <hr />
        <div class="total">
            <h3>TOTAL</h3>
            <div class="numero">
                {{$total}}€
            </div>
        </div>
        <div class="botones">
            @if (count($carrito)>0)

            <a href="{{route('tienda')}}" class="btn btn-outline-secondary">SEGUIR <br>COMPRANDO</a>
            <a  href="{{route('metodo')}}" class="btn btn-outline-secondary">
                COMPRAR
            </a>
            @else
            <a href="{{route('tienda')}}" class="btn btn-outline-secondary">SEGUIR COMPRANDO</a>
            @endif
        </div>
    </div>


</main>

@endsection