@extends('layouts.general')
@section('general-content')
<main class="main-pedido">

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-hite">Datos de la venta</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 datos">
                            <label for="">Nombre</label>
                            <div class="border p-2">
                                {{$usuarios_segunda->nombre}}
                            </div>



                            <label for="">Apellidos</label>

                            <div class="border p-2">
                                {{$usuarios_segunda->apellidos}}
                            </div>


                            <label for="">Fecha de nacimiento</label>

                            <div class="border p-2">
                                {{$usuarios_segunda->fecha}}
                            </div>


                            <label for="">Direccion</label>
                            <div class="border p-2">
                                {{$usuarios_segunda->localidad}},
                                {{$usuarios_segunda->codigoPostal}},
                                {{$usuarios_segunda->pais}}

                            </div>


                            <label for="">Correo electronico</label>
                            <div class="border p-2">
                                {{$usuarios_segunda->email}}
                            </div>



                            <label for="">dni</label>
                            <div class="border p-2">
                                {{$usuarios_segunda->dni}}
                            </div>



                            <label for="">telefono</label>
                            <div class="border p-2">
                                {{$usuarios_segunda->telefono}}
                            </div>


                        </div>
                        <div class="col-md-6 tabla">
                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Valoracion</th>

                                        <th>Precio</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    <tr>
                                        
                                        <td> <img src="{{asset('img/productos_segunda/'.$pedidos_segunda->imagen)}}" width="50px" height="50px" alt="product"></td>
                                        <td> {{$pedidos_segunda->nombre}}</td>
                                        <td> {{$pedidos_segunda->categoria}}</td>
                                        <td>
                                            <?php $rating = number_format($pedidos_segunda->valoracion);  ?>
                                            @for($i=1;$i<=$rating;$i++) <span class="bistar" value="5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" class="bi bi-star-fill" width="20px" height="20px" viewBox="0 0 16 16">
                                                    <path fill="yellow" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                </svg>
                                                </span>
                                                @endfor
                                                @for($j=$rating+1;$j<=5;$j++) <span class="bistar" value="5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill"  width="20px" height="20px" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    </span>
                                                    @endfor
                                                   
                                        </td>

                                        <td> {{$pedidos_segunda->precio}} €</td>

                                    </tr>


                                </tbody>

                            </table>
                            <h3>Precio Total: <span class="float-end">
                                    {{$pedidos_segunda->precio}}€
                                </span></h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>






    </div>



</main>

@endsection