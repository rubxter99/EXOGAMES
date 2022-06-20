@extends('layouts.general')
@section('general-content')
<main class="main-metodo">
    @if (Session::has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{Session::get('danger')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="info-pago">
        <div class="titulo">
            <h2>Informacion de pago</h2>
        </div>
        <div class="metodo">
            <form action="">
                <div class="seleccion">
                    <label for="">Metodo de pago</label>

                    <select name="metodo" class="form-control {{ $errors->has('metodo') ? ' is-invalid' : '' }}" autocomplete="new-text">


                        <option value="0">Tarjeta de Credito</option>
                        <option value="1">Paypal</option>

                    </select>

                </div>
                <div class="numero">
                    <label for="">Numero de tarjeta</label>
                    <input type="number" value="">
                </div>
                <div class="fecha">
                    <label for="">Fecha de caducidad</label>
                    <input type="date" value="">
                </div>
                <div class="cvc">
                    <label for="">cvc</label>
                    <input type="number" value="">
                </div>
            </form>

        </div>

    </div>
    <div class="tarjetas">
        <div class="titulo">
            <h2>Tarjetas disponibles</h2>
        </div>
        <div class="imagenes">
            <img src="{{asset('img/usuarios/metodo.png')}}">
        </div>
    </div>
    <div class="verificacion">

        <div class="titulo">
            <h2>Verificacion de cliente</h2>
        </div>
        <form action="{{route('comprobar')}}" method="POST">
            @csrf
            <div class="nombre">
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="nombre del usuario" value="{{old('nombre')}}">
                @if ($errors->has('nombre'))
                <span class="help-block" style="color: #ff0000">{{ $errors->first('nombre') }}</span>
                @endif

            </div>
            <div class="apellidos">
                <label for="">Apellidos</label>

                <input type="text" name="apellidos" class="form-control {{ $errors->has('apellidos') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="apellidos del usuario" value="{{old('apellidos')}}">
                @if ($errors->has('apellidos'))
                <span class="help-block" style="color: #ff0000">{{ $errors->first('apellidos') }}</span>
                @endif
            </div>
            <div class="fecha">
                <label for="">Fecha de nacimiento</label>

                <input type="date" name="fecha" class="form-control {{ $errors->has('fecha') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="fecha del usuario">
                @if ($errors->has('fecha'))
                <span class="help-block" style="color: #ff0000">{{ $errors->first('fecha') }}</span>
                @endif
            </div>
            <div class="localidad">
                <label for="">Localidad</label>
                <input type="text" name="localidad" class="form-control" autocomplete="new-text" placeholder="localidad del usuario" value="{{old('localidad')}}">

            </div>
            <div class="correo">
                <label for="">Correo electronico</label>
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="email del usuario" value="{{old('email')}}">
                @if ($errors->has('email'))
                <span class="help-block" style="color: #ff0000">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="codigo">
                <label for="">Codigo postal</label>
                <input type="number" name="codigoPostal" class="form-control {{ $errors->has('codigoPostal') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="codigoPostal del usuario" value="{{old('codigoPostal')}}">
                @if ($errors->has('codigoPostal'))
                <span class="help-block" style="color: #ff0000">{{ $errors->first('codigoPostal') }}</span>
                @endif
            </div>
            <div class="pais">
                <label for="">Pais</label>
                <input type="text" name="pais" class="form-control" autocomplete="new-text" placeholder="pais del usuario" value="{{old('pais')}}">

            </div>
            <div class="dni">
                <label for="">dni</label>
                <input type="text" name="dni" class="form-control {{ $errors->has('dni') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="dni del usuario" value="{{old('dni')}}">
                @if ($errors->has('dni'))
                <span class="help-block" style="color: #ff0000">{{ $errors->first('dni') }}</span>
                @endif
            </div>
            <div class="telefono">
                <label for="">telefono</label>
                <input type="tel" name="telefono" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="telefono del usuario" value="{{old('telefono')}}">
                @if ($errors->has('telefono'))
                <span class="help-block" style="color: #ff0000">{{ $errors->first('telefono') }}</span>
                @endif
            </div>
            <button class="btn" type="submit">Finalizar<br> Compra</button>
        </form>

    </div>
    <div class="detalles">
        <div class="titulo">
            <h2>Resumen Pedido</h2>
        </div>
        <div class="contenido">

            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Categoria</th>

                    </tr>

                </thead>
                <tbody>

                    @foreach($ncarrito as $det)
                    <tr>
                        <td> {{$det->nombre}}</td>
                        <td> {{$det->cantidad}}</td>
                   
                        <td> {{$det->categoria}}</td>
                        <td> {{$det->precio}} €</td>
                    </tr>

                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            Total
                        </td>
                        <td>{{$total}}€</td>
                    </tr>
                </tfoot>
            </table>

           
        </div>



    </div>
    </div>

</main>

@endsection