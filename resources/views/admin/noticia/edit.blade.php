@extends('layouts.admin')
@section('admin')
<div class="main">
    @include('layouts.nav')
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    Apartado de Noticias
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('index.noticia')}}">Noticias</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Editar noticia</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                @if(session()->has('danger'))
                <div class="col-lg-12 form-group">
                    <div class="alert alert-danger alert-outline alert-dismissible" role="alert">
                        <div class="alert-icon">
                            <i class="far fa-fw fa-bell"></i>
                        </div>
                        <div class="alert-message">
                            {{session()->get('danger')}}
                        </div>

                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
                @endif
                <div class="col-lg-12">
                    <form method="POST" action="{{route('update.noticia',$noticia->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="card" style="width:100%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            

                                            <div class="col-lg-3  form-group">
                                                <label><b>Titulo de la noticia</b></label>
                                                <input type="text" name="titulo" class="form-control {{ $errors->has('titulo') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="titulo de la noticia" value="{{$noticia->titulo}}">
                                                @if ($errors->has('titulo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('titulo') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="col-lg-3  form-group">
                                                <label><b>Autor</b></label>
                                                <input type="text" name="autor" class="form-control {{ $errors->has('autor') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$noticia->autor}}">
                                                @if ($errors->has('autor'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('autor') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3  form-group">
                                                <label><b>Categoria</b></label>
                                                <input type="text" name="categoria" class="form-control {{ $errors->has('categoria') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$noticia->categoria}}">
                                                @if ($errors->has('categoria'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('categoria') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3  form-group">
                                                <label><b>Fecha de publicacion</b></label>
                                                <input type="date" name="fecha" class="form-control {{ $errors->has('fecha') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$noticia->fecha}}">
                                                @if ($errors->has('fecha'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('fecha') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <label><b>Contenido</b></label>
                                                <textarea name="contenido" class="form-control {{ $errors->has('contenido') ? ' is-invalid' : '' }}" placeholder="Redacte un breve contenido" style="height:80px !important">{{$noticia->contenido}}</textarea>
                                                @if ($errors->has('contenido'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('contenido') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                          
                                            <div class="col-lg-12  text-center">
                                                <button class="btn btn-primary btn-lg" type="submit"><i class="fas fa-save"></i> Actualizar</button>
                                            </div>
                                            

                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-lg-12 form-group">
                                                <div class="text-center">
                                                    <label><b>Portada</b></label>
                                                    <br>
                                                    <img src="{{asset('img/noticias/'.$noticia->imagen)}}" class=" img-responsive mt-2" id="blah" width="150" height="190">
                                                    <div class="mt-2">
                                                        <input id="imgInp" class="btn btn-primary" type="file" name="imagen">
                                                    </div>
                                                   
                                                    @if ($errors->has('imagen'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('imagen') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                           

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>

</div>
@push('scripts')
<script>
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
</script>
@endpush
@endsection