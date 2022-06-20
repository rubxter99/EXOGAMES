@extends('layouts.menu')
@section('menu-content')
<div id="main-menu">


    <div class="servicios">
        <div class="titulo">
            <h2>SERVICIOS</h2>
        </div>
        <div class="imagenes">
            <a href="{{route('tienda')}}" class="opcion tienda">
                <div class="txt">
                    <h3>TIENDA</h3>
                </div>

            </a>
            @if (!Auth::check())
            <a href="{{route('login')}}" class="opcion mano">

                <div class="txt">
                    <h3>2A MANO</h3>
                </div>
            </a>
            @else
            <a href="{{route('segunda')}}" class="opcion mano">

                <div class="txt">
                    <h3>2A MANO</h3>
                </div>
            </a>
            @endif



            <a href="{{route('noticias')}}" class="opcion noticias">

                <div class="txt">
                    <h3>NOTICIAS</h3>
                </div>


            </a>
            <a href="{{route('contacto')}}" class="opcion noticias">
                <div class="txt">
                    <h3>CONOCENOS</h3>
                </div>

            </a>
        </div>
    </div>
    <div class="banner">
        <img src="img/usuarios/banners/banner-2.png">
    </div>
    <div class="ventajas">
        <div class="card">
            <div class="card-title">BENEFICIOS</div>
            <div class="card-imagen"><img src="img/usuarios/servicio-1.png"></div>
            <div class="card-parrafo">
                <p>Nuestra tienda posee ofertas exclusivas que encontraras ern nuestra tienda y no hay gastos de envío.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-title">SEGURIDAD</div>
            <div class="card-imagen"><img src="img/usuarios/servicio-2.png"></div>
            <div class="card-parrafo">
                <p>Poseemos certificados ssl para mayor seguridad a la hora de proteger tus datos.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-title">RAPIDEZ</div>
            <div class="card-imagen"><img src="img/usuarios/servicio-3.jpg"></div>
            <div class="card-parrafo">
                <p>Rapidez a la hora de comprar en tan solo un click tanto compra como venta de productos.</p>
            </div>
        </div>
    </div>

    <div class="productos">
        <div class="mensaje">
            <p>¡¡VENDENOS SIN NINGUNA COMPLICACION!!</p>
        </div>
        <div class="imagen-mensaje">
            <img src="img/usuarios/productos.png">
        </div>
    </div>

    <div class="banner-registro">
        <div class="mensaje">
            <p>Aprovecha a registrarte en nuestra web y podras comprar y vender los productos relacionados con el mundo del ocio en el sector de los videojuegos</p>
        </div>
        <div class="boton">
            <a href="{{route('login')}}">
                <p>REGISTRATE</p>
            </a>
        </div>
    </div>
</div>
@endsection