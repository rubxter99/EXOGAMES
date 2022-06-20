@extends('layouts.admin')
@section('admin')
<div class="main mb-4">
    @include('layouts.nav')
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    <i class=" fas fa-solid fa-users"></i> Gestión de noticias</i>
                </h1>

            </div>

            @if(session()->has('success'))
            <div class="alert alert-info alert-outline alert-dismissible" role="alert">
                <div class="alert-icon">
                    <i class="far fa-fw fa-bell"></i>
                </div>
                <div class="alert-message">
                    {{session()->get('success')}}
                </div>

                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif

            @if(session()->has('danger'))
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
            @endif
            <div class="row">
                <div class="col-lg-6">
                    {!! Form::open(array('url'=>'admin/noticia','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                    <div class="input-group" id="show_hide_password">
                        <input class="form-control" type="text" placeholder="Buscar noticia" name="buscar" value="{{$buscar}}">
                        <div class="input-group-addon">
                            <button class="btn btn-info"><i class="fas fa-search"></i></button>
                            <a href="{{route('index.noticia')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i></a>
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
                            <a class="dropdown-item" href="{{route('create.noticia')}}"><i class="fas fa-archive"></i> Publicar noticia</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th >Portada</th>
                                <th >Titulo</th>
                                <th >Autor</th>
                                <th >Categoria</th>
                                <th >Fecha de publicacion</th>
                                <th >Opciones</th>
                            </tr>
                        </thead>
                        @foreach($noticias as $item)
                        <tbody>
                            <tr>


                                <td> <img src="{{asset('img/noticias/'.$item->imagen)}}" width="48" height="48" class=" mr-2" alt="Avatar"></td>
                                <td>{{$item->titulo}} </td>
                                <td>{{$item->autor}} </td>
                                <td> {{$item->categoria}}</td>
                                <td>{{$item->fecha}}</td>


                                <td>
                                    <div class="btn-group probar" id="{{$item->id}}">
                                        <button type="button" class="btn mb-1 btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu probar_txt" id="{{$item->id}}_txt">
                                            <a class="dropdown-item" href="{{route('edit.noticia',$item->id)}}"><i class="fas fa-edit"></i> Editar noticia</a>

                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-{{$item->id}}" id="#modal-{{$item->id}}_icon" style="color:black">Eliminar noticia</a>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <form action="{{route('noticias.eliminar',$item->id)}}" method="POST">
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

                                                        Desea eliminar definitivamente la noticia?

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
                    {{$noticias->links()}}
                </div>
            </div>


        </div>
    </main>

</div>

@endsection