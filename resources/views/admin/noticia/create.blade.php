@extends('layouts.admin')
@section('admin')
<div class="main">
    @include('layouts.nav')
    <main class="content">
        <div class="container-fluid">
           
                <div class="header">
                    <h1 class="header-title">
                        Apartado de noticias
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('index.noticia')}}">Noticias</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Registro noticias</li>
                        </ol>
                    </nav>
                </div>
            
                <div class="row">
                    @if(Session::has('danger'))
                        <div class="col-lg-12 form-group">
                            <div class="alert alert-danger alert-outline alert-dismissible" role="alert">
                                <div class="alert-icon">
                                    <i class="far fa-fw fa-bell"></i>
                                </div>
                                <div class="alert-message">
                                {{Session::get('danger')}}
                                </div>
            
                                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-server"></i> Registro</a>
                            </li>
                           
                          </ul>
                        <div class="tab-content" id="myTabContent">
                            {{--REGISTRO --}}
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <form method="POST" action="{{route('store.noticia')}}"  enctype="multipart/form-data" >
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mt-4">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-9 form-group">
                                                            <label><b>Titulo de la noticia</b></label>
                                                            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"  placeholder="titulo del producto" value="{{old('titulo')}}"  >
                                                            @if ($errors->has('titulo'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('titulo') }}</strong>
                                                                </span>
                                                            @endif
                                                            
                                                        </div>
                                                        <div class="col-lg-3 form-group">
                                                            <label><b>Autor</b></label>
                                                            <input type="text" name="autor" class="form-control {{ $errors->has('autor') ? ' is-invalid' : '' }}" value="{{old('autor')}}" placeholder="Autor"  >
                                                            @if ($errors->has('autor'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('autor') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                  
                                                        <div class="col-lg-3 form-group">
                                                            <label><b>Categoria</b></label>
                                                            <input type="text" name="categoria" class="form-control {{ $errors->has('categoria') ? ' is-invalid' : '' }}"  value="{{old('categoria')}}" placeholder="Accion"  >
                                                            @if ($errors->has('categoria'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('categoria') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-3 form-group">
                                                            <label><b>Fecha de publicacion</b></label>
                                                            <input type="date" name="fecha" class="form-control {{ $errors->has('fecha') ? ' is-invalid' : '' }}"  value="{{old('fecha')}}" placeholder="0"  >
                                                            @if ($errors->has('fecha'))
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('fecha') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                       
                                                        
                                                        <div class="col-lg-12 form-group">
                                                        <label><b>Contenido</b></label>
                                                            <textarea name="contenido" class="form-control {{ $errors->has('contenido') ? ' is-invalid' : '' }}" placeholder="Redacte un breve contenido" style="height:80px !important"  >{{old('contenido')}}</textarea>
                                                            @if ($errors->has('contenido'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('contenido') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                       
                                                        <div class="col-lg-12 form-group">
                                                            <button class="btn btn-primary btn-lg" type="submit"><i class="fas fa-save"></i> Publicar</button>
                                                        </div>
        
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-12 form-group">
                                                            <div class="text-center">
                                                                <label><b>Portada</b></label>
                                                                <br>
                                                                <img src="{{asset('img/default.png')}}" class=" img-responsive mt-2" id="blah" width="150" height="190">
                                                                <div class="mt-2">
                                                                    <input id="imgInp" class="btn btn-primary" type="file" name="imagen"  >
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
                            {{--REGISTRO --}}
                           
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </main>
    
</div>
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#btn_add').click(function(){
                agregar();		
            })
        });

        var cont = 0;
        $('#guardar').hide();

        function agregar(){
            var fila ='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input required type="file" name="imagen[]" class="form-control"></td></tr>'
            cont++;
            $('#detalles').append(fila);
        }


        function eliminar(index){
            $('#fila' + index).remove();
            cont=-1;
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
    </script>
@endpush
@endsection