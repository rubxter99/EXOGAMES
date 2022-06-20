@extends('layouts.general')
@section('general-content')
<main id="main-perfil">
    <div class="top">


        <div class="datos">
            <div class="col-sm-12 col-md-12 col-lg-12" id="contenido" enctype="multipart/form-data">


                <form action="{{route('perfil.edit')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
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
                            @if($usuario->imagen!="")
                            <img src="{{asset('img/usuarios/clientes/'.$usuario->imagen)}}" class=" img-responsive mt-2" id="blah" width="150" height="190">
                            @endif
                            @if($usuario->imagen=="")
                            <img src="{{asset('img/usuarios/iconos/icono-4.svg')}}" class=" img-responsive mt-2" id="blah" width="150" height="190">
                            @endif
                            <div class="seleccion">
                                <input id="imgInp" class="btn btn-primary" type="file" name="icono">
                            </div>

                            @if ($errors->has('imagen'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('imagen') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="formulario-cont">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <label for="acc-name">Nombre</label>
                                        <input type="text" class="form-control" id="acc-name" name="nombre" required value="{{$usuario->nombre}}" placeholder="Nombres">
                                        @if ($errors->has('nombre'))
                                        <span class="help-block" style="color: #ff0000">{{ $errors->first('nombre') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="acc-mname">Apellido</label>
                                        <input type="text" class="form-control" id="acc-mname" name="apellidos" value="{{$usuario->apellidos}}" placeholder="Apellidos">
                                        @if ($errors->has('apellidos'))
                                        <span class="help-block" style="color: #ff0000">{{ $errors->first('apellidos') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-12 form-group required-field">
                                    <label for="acc-email">Correo electrónico</label>
                                    <input type="text" readonly class="form-control" id="acc-email"  value="{{$usuario->email}}">
                                </div>

                               

                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <label for="acc-name">Telefono</label>
                                        <input type="number" class="form-control" id="acc-name" name="telefono" required value="{{$usuario->telefono}}" placeholder="Teléfono de contacto">
                                        @if ($errors->has('telefono'))
                                        <span class="help-block" style="color: #ff0000">{{ $errors->first('telefono') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group required-field">
                                        <label for="acc-name">DNI</label>

                                        <input type="text" class="form-control" id="acc-name" name="dni"  value="{{$usuario->dni}}" placeholder="DNI">
                                        @if ($errors->has('dni'))
                                        <span class="help-block" style="color: #ff0000">{{ $errors->first('dni') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-sm-12 mt-4 text-right">
                                    <button type="submit" class="btn btn-secondary">ACTUALIZAR</button>
                                </div>

                            </div>
                        </div>
                    </div>


                </form>
            </div>


        </div>
    </div>


    <div class="productos_comprados">
        <div class="titulo">
            <h2>Pedidos</h2>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                            
                                <th class="text-center">Código</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Ver</th>
                            </tr>
                        </thead>
                       
                        @foreach($pedidos as $item)
                            <tbody>
                                <tr>
                                    <td class="text-center">{{strtoupper($item->codigo)}}</td>
                                    <td class="text-center">{{$item->fecha}}</td>
                                    
                                    <td class="text-center">
                                        <i class="fas fa-dollar-sign"></i> {{$item->preciototal}}€
                                    </td>
                                    <td class="text-center">
                                     
                                            <a href="{{route('perfil.pedido',$item->id)}}" class="btn mb-1 btn-primary">VER PEDIDO</a>
										
                                    </td>

                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                   
                </div>
            </div>
        </div>
    </div>

    <div class="productos_vendidos">
        <div class="titulo">
            <h2>PRODUCTOS VENDIDOS</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($pedidos_segunda as $item_segunda)
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('img/productos_segunda/'.$item_segunda->imagen)}}">
                            <div class="card-body">
                                <h5>{{$item_segunda->nombre}}</h5>

                                <a href="{{route('perfil.pedido_segunda',$item_segunda->id)}}" class="btn mb-1 btn-primary">VER</a>
                            </div>

                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="boton">

        <form method="POST" action="{{route('logout')}}">
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary">CERRAR SESION</button>
        </form>
    </div>

</main>
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

    $('.featured-carousel').owlCarousel({
        loop: false,
        autoplay: true,
        margin: 30,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        nav: true,
        dots: false,
        autoplayHoverPause: false,
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