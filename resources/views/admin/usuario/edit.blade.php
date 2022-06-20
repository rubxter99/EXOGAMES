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
                        <li class="breadcrumb-item active" aria-current="page">Editar registro</li>
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
                    <form method="POST" action="{{route('update.usuario',$usuario->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="card" style="width:100%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-3 form-group">
                                                <label><b>DNI</b></label>
                                                <input type="text" name="dni" class="form-control {{ $errors->has('dni') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="dni del usuario" value="{{$usuario->dni}}">
                                                @if ($errors->has('dni'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dni') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-lg-3  form-group">
                                                <label><b>Nombre del usuario</b></label>
                                                <input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="Nombre del usuario" value="{{$usuario->nombre}}">
                                                @if ($errors->has('nombre'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nombre') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="col-lg-3  form-group">
                                                <label><b>Apellidos</b></label>
                                                <input type="text" name="apellidos" class="form-control {{ $errors->has('apellidos') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$usuario->apellidos}}">
                                                @if ($errors->has('apellidos'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('apellidos') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3  form-group">
                                                <label><b>Email</b></label>
                                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$usuario->email}}">
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3  form-group">
                                                <label><b>Telefono</b></label>
                                                <input type="number" name="telefono" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$usuario->telefono}}">
                                                @if ($errors->has('telefono'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('telefono') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3  form-group">
                                                <label><b>Rol</b></label>
                                                <input type="text" name="rol" class="form-control {{ $errors->has('rol') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$usuario->rol}}">
                                                @if ($errors->has('rol'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('rol') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3  form-group">
                                                <label><b>Password</b></label>
                                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$usuario->password}}">
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
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
                                                    @if($usuario->imagen)
                                                    <img src="{{asset('img/usuarios/clientes/'.$usuario->imagen)}}" class=" bi bi-person-circle" id="blah" width="150" height="190">
                                                    @endif
                                                    @if(!$usuario->imagen)
                                                    <img src="{{asset('img/usuarios/iconos/icono-4.svg')}}" class=" bi bi-person-circle "id="blah" width="150" height="190">
                                                    @endif
                                                   
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