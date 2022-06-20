@extends('layouts.general')
@section('general-content')
<main id="main-segunda">
    <div id="segunda-mano" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#segunda-mano" data-slide-to="0" class="active"></li>
            <li data-target="#segunda-mano" data-slide-to="1"></li>
            <li data-target="#segunda-mano" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/usuarios/slider/2mano/slider-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/usuarios/slider/2mano/slider-2.webp" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/usuarios/slider/2mano/slider-3.jpg" alt="Third slide">
            </div>
        </div>
        <div class="titulo">
            <h1>2A MANO</h1>
        </div>


    </div>
    <div class="venta">


        <div class="datos">
            <div class="col-sm-12 col-md-12 col-lg-12" id="contenido" enctype="multipart/form-data">


                <form action="{{route('segunda.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        @if(Session::has('success'))
                        <div class="col-sm-11 form-group">
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if(Session::has('danger'))
                        <div class="col-sm-11 form-group">
                            <div class="alert alert-danger">
                                {{Session::get('danger')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        <div class="form-group imagen">


                            <img src="{{asset('img/usuarios/iconos/icono-5.png')}}" class=" img-responsive mt-2" id="blah">

                            <div class="seleccion">
                                <input id="imgInp" class="btn btn-primary" type="file" name="fotico">
                            </div>

                            @if ($errors->has('imagen'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('imagen') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="formulario-cont formulario">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group required-field">
                                        <label for="acc-name">Titulo</label>
                                        <input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="nombre del producto" value="{{old('nombre')}}">
                                        @if ($errors->has('nombre'))
                                        <span class="help-block" style="color: #ff0000">{{ $errors->first('nombre') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><b>Descripcion</b></label>
                                    <textarea name="descripcion" class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="Redacte una breve descripción" style="height:80px !important">{{old('descripcion')}}</textarea>
                                    @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group required-field val">
                                    <label for="acc-email">Valoracion</label>
                                    <div class="star">
                                        <span clas="bistar" onclick="valorar(this)" style="cursor:pointer;" id="1estrella">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </span>
                                        <span clas="bistar" onclick="valorar(this)" style="cursor:pointer;" id="2estrella">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </span>
                                        <span clas="bistar" onclick="valorar(this)" style="cursor:pointer;" id="3estrella">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </span>
                                        <span clas="bistar" onclick="valorar(this)" style="cursor:pointer;" id="4estrella">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </span>
                                        <span clas="bistar" onclick="valorar(this)" style="cursor:pointer;" id="5estrella">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </span>
                                    </div>


                                    <input name="valoracion" hidden type="text" readonly class="form-control" id="valor" value="{{old('valoracion')}}">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><b>Categoría</b></label>
                                    <select name="idCategoria" class="form-control {{ $errors->has('idCategoria') ? ' is-invalid' : '' }}" autocomplete="new-text">
                                        @foreach ($categorias as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('idCategoria'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('idCategoria') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><b>Precio</b></label>
                                    <input type="number" name="precio" class="form-control {{ $errors->has('precio') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('precio')}}" placeholder="0.0">
                                    @if ($errors->has('precio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('precio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label><b>Comentario</b></label>
                                    <textarea name="comentario" class="form-control {{ $errors->has('comentario') ? ' is-invalid' : '' }}" placeholder="Redacte un breve comentario" style="height:80px !important">{{old('comentario')}}</textarea>
                                    @if ($errors->has('comentario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comentario') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-sm-12 mt-4 text-right">
                                    <button type="submit" class="btn btn-secondary">VENDER</button>
                                </div>

                            </div>
                        </div>
                    </div>


                </form>
            </div>


        </div>
    </div>

    <div class="banner-1">
        <img src="img/usuarios/banners/banner-4.jpg" alt="">
    </div>
    <div class="banner-2">
        <img src="img/usuarios/banners/banner-5.jpg" alt="">
    </div>

    <div class="tus_productos">
        <div class="titulo">
            <h2>TUS PRODUCTOS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($productos_segunda as $item)
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('img/productos_segunda/'.$item->imagen)}}">
                            <div class="card-body">
                                <h5>{{$item->nombre}}</h5>

                                <button type="button" class="btn btn-primary">Ver</button>
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
    var contador;

    function valorar(item) {

        var valor = document.getElementById('valor');

        contador = item.id[0];
        let estrella = item.id.substring(1);

        for (let i = 0; i < 5; i++) {

            if (i < contador) {
                document.getElementById((i + 1) + estrella).style.color = "yellow";
                document.getElementById((i + 1) + estrella).setAttribute("value", i + 1);
            } else {
                document.getElementById((i + 1) + estrella).style.color = "grey";
                document.getElementById((i + 1) + estrella).setAttribute("value", i + 1);
            }

        }
        valor.setAttribute("value", item.getAttribute("value"));

    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });

    $('.featured-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
    
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
</script>
@endpush
@endsection