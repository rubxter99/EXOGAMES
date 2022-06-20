@extends('layouts.admin')
@section('admin')
<div class="main">
    @include('layouts.nav')
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    <i class="fas fa-kaaba"></i> Mis productos
                </h1>

            </div>

            <div class="row">
                @if(Session::has('succes'))
                <div class="col-lg-12 form-group">
                    <div class="alert alert-success alert-outline alert-dismissible" role="alert">
                        <div class="alert-icon">
                            <i class="far fa-fw fa-bell"></i>
                        </div>
                        <div class="alert-message">
                            {{Session::get('succes')}}
                        </div>

                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
                @endif

                <div class="col-11 col-xl-10">
                    <div class="card">
                        <div class="card-header">

                            <h5 class="card-title">Listado de productos</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    {!! Form::open(array('url'=>'admin/producto','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-control" type="text" placeholder="Buscar producto" name="buscar" value="{{$buscar}}">
                                        <div class="input-group-addon">
                                            <button class="btn btn-info"><i class="fas fa-search"></i></button>
                                            <a href="{{route('index.producto')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i></a>
                                        </div>
                                    </div>
                                    {{Form::close()}}
                                </div>
                                <div class="col-lg-2">
                                    <div class="btn-group">
                                        <button type="button" id="crear" class="btn mb-1 btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Optiones
                                        </button>
                                        <div class="dropdown-menu" id="registrar" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                            <a class="dropdown-item" href="{{route('create.producto')}}"><i class="fas fa-archive"></i> Registrar producto</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <table class="table table-striped table-hover " >
                            <thead class="thead-dark">
                                <tr>
                                    <th >Nombre</th>
                                   
                                    <th >Categoria</th>
                                    <th >Fecha de publicacion</th>
                                    <th >Genero</th>
                                    <th >Precio</th>
                                    <th >Stock</th>
                                    <th >Opciones</th>
                                </tr>
                            </thead>
                            @foreach ($productos as $item)
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{asset('img/productos/'.$item->imagen)}}" width="48" height="48" class=" mr-2" alt="Avatar"> {{$item->nombre}}
                                    </td>
                                   
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
                                   
                                    
                                    <td>
                                        <div class="btn-group probar" id="{{$item->id}}">
                                            <button type="button" class="btn mb-1 btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu probar_txt" id="{{$item->id}}_txt">
                                                <a class="dropdown-item" href="{{route('edit.producto',$item->id)}}"><i class="fas fa-edit"></i> Editar detalles</a>
                                                
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-bs-target="#modal-{{$item->id}}" data-bs-toggle="modal" id="#modal-{{$item->id}}_icon"  style="color:black">Eliminar producto</a>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <form action="{{route('productos.eliminar',$item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirmación de eliminarción</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            Desea eliminar definitivamente los datos del producto?

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>&nbsp;
                                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                             
                                      
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="col-12 col-xl-12">
                    {{$productos->links()}}
                    
                </div>
            </div>



        </div>
    </main>

</div>
@endsection