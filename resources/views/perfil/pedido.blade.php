@extends('layouts.general')
@section('general-content')
<main class="main-pedido">

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-hite">Datos del pedido</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 datos">
                            <label for="">Nombre</label>
                            <div class="border p-2">
                                {{$usuarios->nombre}}
                            </div>



                            <label for="">Apellidos</label>

                            <div class="border p-2">
                                {{$usuarios->apellidos}}
                            </div>


                            <label for="">Fecha de nacimiento</label>

                            <div class="border p-2">
                                {{$usuarios->fecha}}
                            </div>


                            <label for="">Direccion</label>
                            <div class="border p-2">
                                {{$usuarios->localidad}},
                                {{$usuarios->codigoPostal}},
                                {{$usuarios->pais}}

                            </div>


                            <label for="">Correo electronico</label>
                            <div class="border p-2">
                                {{$usuarios->email}}
                            </div>



                            <label for="">dni</label>
                            <div class="border p-2">
                                {{$usuarios->dni}}
                            </div>



                            <label for="">telefono</label>
                            <div class="border p-2">
                                {{$usuarios->telefono}}
                            </div>


                        </div>
                        <div class="col-md-6 tabla">
                            <table class="table table-bordered">
                                <thead>
                                    
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                       

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($pedidos as $pro)
                                    <tr>
                                        <td> <img src="{{asset('img/productos/'.$pro->imagen)}}"  width="50px" height="50px" alt="product"></td>
                                        <td> {{$pro->nombre}}</td>
                                        <td> {{$pro->categoria}}</td>
                                        <td> {{$pro->cantidad}}</td>
                                        <td> {{$pro->precio}} €</td>
                                        
                                    </tr>

                                    @endforeach
                                </tbody>
                               
                            </table>
                            <h3>Precio Total: <span class="float-end">
                                {{$total->preciototal}}€
                            </span></h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>






    </div>



</main>

@endsection