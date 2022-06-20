@extends('layouts.general')
@section('general-content')
<main id="main-contacto">
    <div id="contacto" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#contacto" data-slide-to="0" class="active"></li>
            <li data-target="#contacto" data-slide-to="1"></li>
            <li data-target="#contacto" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/usuarios/slider/contacto/slider-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/usuarios/slider/contacto/slider-2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/usuarios/slider/contacto/slider-3.jpg" alt="Third slide">
            </div>
        </div>
        <div class="titulo">
            <h1>CONOCENOS</h1>
        </div>


    </div>

    <div class="origen">
        <div class="contenido">
            <div class="titulo">
                <h2>ORIGEN</h2>
            </div>
            <div class="descripcion">
                <p>EXOGAMES se origino en base a una idea con disposicion multiplataforma de venta y compra de productos en el sector de los videojuegos con tan solo un click sin necesidad de disponibilidad presencial por parte del cliente.</p>
            </div>
        </div>

    </div>
    <div class="formulario">
        <br>
        <br>
        <div class="col-md-12">
            <h2 class="titulo"><strong>FORMULARIO DE CONTACTO </strong></h2>
            @if(Session::has('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if(Session::has('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{Session::get('danger')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <form action="{{route('contacto.send')}}" method="POST">
                @csrf
                <div class="campo-1">
                    <div class="form-group required-field" id="nombre">
                        <label for="contact-name">Nombres y apellidos</label>
                        <input type="text" class="form-control" id="contact-name" name="nombre" required  value="{{old('nombre')}}">
                        @if ($errors->has('nombre'))
                        <span class="help-block" style="color: #ff0000">{{ $errors->first('nombre') }}</span><br>
                        @endif
                    </div>
                    <div class="form-group" id="telefono">
                        <label for="contact-phone">Telefono</label>
                        <input type="tel" class="form-control" id="contact-phone" name="telefono"  value="{{old('telefono')}}">
                        @if ($errors->has('telefono'))
                        <span class="help-block" style="color: #ff0000">{{ $errors->first('telefono') }}</span><br>
                        @endif
                    </div>
                </div>

                <div class="campo-2">
                    <div class="form-group required-field" id="email">
                        <label for="contact-email">Correo Electronico</label>
                        <input type="email" class="form-control" id="contact-email" name="correo" required value="{{old('correo')}}">
                        @if ($errors->has('correo'))
                        <span class="help-block" style="color: #ff0000">{{ $errors->first('correo') }}</span><br>
                        @endif
                    </div>
                </div>



                <div class="campo-3">
                    <div class="form-group required-field" id="asunto">
                        <label for="contact-message">MENSAJE</label>
                        <textarea cols="30" rows="1" id="contact-message" class="form-control" name="asunto" >{{old('asunto')}}</textarea>
                        @if ($errors->has('asunto'))
                        <span class="help-block" style="color: #ff0000">{{ $errors->first('asunto') }}</span><br>
                        @endif
                    </div>
                </div>
                <div class="campo-4">
                    <div class="form-group" id="politica">

                        <input type="checkbox" class="form-control" id="check" name="check" required><label>Politica de privacidad</label>

                    </div>
                </div>

                <div class="form-footer" id="boton">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>


    </div>
    <div class="mapa">
        <div class="mapouter">
            <div class="gmap_canvas"><iframe  id="gmap_canvas" src="https://maps.google.com/maps?q=madrid&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net"></a><br>
                <a href="https://www.embedgooglemap.net">embedgooglemap.net</a>

            </div>
        </div>
    </div>

</main>

@endsection