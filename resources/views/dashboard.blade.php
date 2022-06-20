@extends('layouts.admin')
@section('admin')
<div class="main">
    @include('layouts.nav')
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    Panel principal
                </h1>
                <p class="header-subtitle">Datos generales de la tienda.</p>
            </div>


            <div class="row form-group">



                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card">

                        <a href="{{route('create.producto')}}">
                            <button type="submit" class="btn btn-primary w-100 h-100">AÑADIR PRODUCTO</button>
                        </a>


                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <a href="{{route('create.usuario')}}">
                            <button type="submit" class="btn btn-secondary w-100 h-100">AÑADIR USUARIO</button>
                        </a>
                    </div>
                </div>


            </div>

            <div class="row form-group">



                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Usuarios</h5>
                                </div>


                            </div>
                            <h1 class="display-5 mt-1 mb-3">{{count($usuariosdashcount)}}</h1>
                            <div class="mb-0">
                                Usuarios registrados en la tienda
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Productos</h5>
                                </div>


                            </div>
                            <h1 class="display-5 mt-1 mb-3">{{count($productosdashcount)}}</h1>
                            <div class="mb-0">
                                Productos registrados en la tienda
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Pedidos</h5>
                                </div>


                            </div>

                            <div class="mb-0">
                                Pedidos registrados en la tienda
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <h3 class="header-title text-center ">
                        Productos
                    </h3>
                    <div class="card">
                        <table class="table table-striped table-hover table-sm">
                            <thead class="thead-dark">
                                <tr>

                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Valoracion</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Fecha de publicacion</th>
                                    <th class="text-center">Genero</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Stock</th>
                                

                                </tr>
                            </thead>

                            @foreach ($productosdash as $item)
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{asset('img/productos/'.$item->imagen)}}" width="48" height="48" class=" mr-2" alt="Avatar"> {{$item->nombre}}
                                    </td>
                                    <td>{{$item->valoracion}} </td>
                                    @if($item->idCategoria==1)
                                    <td>Consola </td>
                                    @endif
                                    @if($item->idCategoria==2)
                                    <td>Videojuego </td>
                                    @endif

                                    <td>{{$item->fecha}} </td>

                                    <td>{{$item->genero}} </td>
                                    <td> {{$item->precio}}<b>€</b></td>
                                    <td>{{$item->stock}} unidades</td>


                                </tr>
                            </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>

           

            <div class="row form-group">
                <div class="col-md-12  col-lg-6">
                    <h3 class="header-title text-center ">
                        Usuarios
                    </h3>
                    <div class="card">
                        <table class="table table-striped table-hover table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Nombres completos</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Telefono</th>
                                    <th class="text-center">Rol</th>
                                </tr>
                            </thead>
                            @foreach($usuariosdash as $item2)
                            <tbody>
                                <tr>

                                    <td class="text-center">{{$item2->nombre}} {{$item2->apellidos}}</td>
                                    <td class="text-center">{{$item2->email}}</td>
                                    <td class="text-center">{{$item2->telefono}}</td>
                                    <td class="text-center">{{$item2->rol}}</td>


                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="col-md-12  col-lg-6">
                    <h3 class="header-title text-center ">
                        Pedidos
                    </h3>
                    <div class="card">
                        <table class="table table-striped table-hover table-sm">
                            <thead class="thead-dark">
                                <tr>
                                
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Precio</th>
                                   
                                </tr>
                            </thead>
                            @foreach($pedidosdash as $item3)
                            <tbody>
                                <tr>

                                
                                    <td class="text-center">{{strtoupper($item3->codigo)}}</td>
                                    <td class="text-center">{{$item3->fecha}}</td>
                                   
                                    
                                    <td class="text-center">
                                         {{$item3->preciototal}}€
                                    </td>
                                   

                                

                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
                <div class="col-md-12  col-lg-6">
                    <h3 class="header-title text-center ">
                        Pedidos Segunda Mano
                    </h3>
                    <div class="card">
                        <table class="table table-striped table-hover table-sm">
                            <thead class="thead-dark">
                                <tr>
                                
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Precio</th>
                                   
                                </tr>
                            </thead>
                            @foreach($pedidos_segundadash as $item4)
                            <tbody>
                                <tr>

                                
                                    <td class="text-center">{{strtoupper($item4->codigo)}}</td>
                                    <td class="text-center">{{$item4->fecha}}</td>
                                   
                                    
                                    <td class="text-center">
                                       {{$item4->preciototal}}€
                                    </td>
                                   

                                

                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>

            </div>
           



        </div>


    </main>

</div>

@endsection