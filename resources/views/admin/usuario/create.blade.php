@extends('layouts.admin')
@section('admin')
<div class="main">
    @include('layouts.nav')
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    Apartado de usuarios
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('index.usuario')}}">Usuarios</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registro</li>
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

                    <div class="tab-content" id="myTabContent">
                        {{--REGISTRO --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form method="POST" action="{{route('store.usuario')}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mt-4">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-9 form-group">
                                                        <label><b>Nombre del usuario</b></label>
                                                        <input type="text" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" autocomplete="nombre" placeholder="Nombre del usuario" value="{{old('nombre')}}">

                                                        @if ($errors->has('nombre'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('nombre') }}</strong>
                                                        </span>
                                                        @endif
                                                       
                                                    </div>


                                                    <div class="col-lg-3 form-group">
                                                        <label><b>Apellidos</b></label>
                                                        <input type="text" name="apellidos" class="form-control {{ $errors->has('apellidos') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('apellidos')}}" placeholder="Apellidos">
                                                        @if ($errors->has('apellidos'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('apellidos') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 form-group">
                                                        <label><b>Email</b></label>
                                                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('email')}}" placeholder="email@email.com">
                                                        @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 form-group">
                                                        <label><b>Teléfono</b></label>
                                                        <input type="tel" name="telefono" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('telefono')}}" placeholder="12332113">
                                                        @if ($errors->has('telefono'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('telefono') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 form-group">
                                                        <label><b>Rol</b></label>
                                                        <input type="text" name="rol" class="form-control {{ $errors->has('rol') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('rol')}}" placeholder="cliente">
                                                        @if ($errors->has('rol'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('rol') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 form-group">
                                                        <label><b>Password</b></label>
                                                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('password')}}" placeholder="password">
                                                        @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>

                                                    <div class="col-lg-12 form-group">
                                                        <button class="btn btn-primary btn-lg" type="submit"><i class="fas fa-save"></i> Registrar</button>
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
    $(document).ready(function() {
        $('#btn_add').click(function() {
            agregar();
        })
    });

    var cont = 0;
    $('#guardar').hide();



    function eliminar(index) {
        $('#fila' + index).remove();
        cont = -1;
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