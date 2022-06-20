@extends('layouts.general')
@section('general-content')
<div id="main-noticias">

    <div id="noticias" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#noticias" data-slide-to="0" class="active"></li>
            <li data-target="#noticias" data-slide-to="1"></li>
            <li data-target="#noticias" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/usuarios/slider/noticias/slider-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/usuarios/slider/noticias/slider-2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/usuarios/slider/noticias/slider-3.jpg" alt="Third slide">
            </div>
        </div>
        <div class="titulo">
            <h1>NOTICIAS</h1>
        </div>


    </div>

    <div class="contenido-general">

        <div class="post">
            <div class="imagen"><img src="{{asset('img/noticias/'.$noticias[0]->imagen);}}"></div>
            <div class="texto">
                <h3>{{$noticias[0]->titulo}}</h3>
                <h4>{{$noticias[0]->autor}} {{$noticias[0]->fecha}}</h4>
                
            </div>
        </div>
        <div class="post especial">
            <div class="imagen"><img src="{{asset('img/noticias/'.$noticias[1]->imagen);}}"></div>
            <div class="texto">
                <h3>{{$noticias[1]->titulo}}</h3>
                <h4>{{$noticias[1]->autor}} {{$noticias[1]->fecha}}</h4>
                
            </div>
        </div>
        <div class="post">
            <div class="imagen"><img src="{{asset('img/noticias/'.$noticias[2]->imagen);}}"></div>
            <div class="texto">
                <h3>{{$noticias[2]->titulo}}</h3>
                <h4>{{$noticias[2]->autor}} {{$noticias[2]->fecha}}</h4>
                
            </div>
        </div>
        <div class="post especial-0">
            <div class="imagen"><img src="{{asset('img/noticias/'.$noticias[3]->imagen);}}"></div>
            <div class="texto">
                <h3>{{$noticias[3]->titulo}}</h3>
                <h4>{{$noticias[3]->autor}} {{$noticias[3]->fecha}}</h4>
                
            </div>
        </div>
        <div class="post especial-1">
            <div class="imagen"><img src="{{asset('img/noticias/'.$noticias[4]->imagen);}}"></div>
            <div class="texto">
                <h3>{{$noticias[4]->titulo}}</h3>
                <h4>{{$noticias[4]->autor}} {{$noticias[4]->fecha}}</h4>
                
            </div>
        </div>
        <div class="post especial-2">
            <div class="imagen"><img src="{{asset('img/noticias/'.$noticias[5]->imagen);}}"></div>
            <div class="texto">
                <h3>{{$noticias[5]->titulo}}</h3>
                <h4>{{$noticias[5]->autor}} {{$noticias[5]->fecha}}</h4>
                
            </div>
        </div>
    </div>
    <div class="contenido-final">
        <div class="imagen"><img src="{{asset('img/noticias/'.$noticiasfinal->imagen);}}"></div>
        <div class="texto">
            <h3>{{$noticiasfinal->titulo}}</h3>
            <h4>{{$noticiasfinal->autor}} {{$noticiasfinal->fecha}}</h4>
            <p>{{$noticiasfinal->contenido}}</p>
        </div>
    </div>

</div>
@endsection