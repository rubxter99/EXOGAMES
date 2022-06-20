@extends('layouts.admin')
@section('admin')
<div class="main mb-4">
    @include('layouts.nav')
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    <i class="fas fa-hand-holding-usd"></i> Pedidos
                </h1>

            </div>

            @if(Session::has('success'))
                <div class="alert alert-info alert-outline alert-dismissible" role="alert">
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        {{Session::get('success')}}
                    </div>

                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(Session::has('danger'))
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
            @endif
            
            <div class="row">
                <div class="col-lg-6">
                    {!! Form::open(array('url'=>'admin/pedidos','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                    <div class="input-group" id="show_hide_password">
                        <input class="form-control" type="text" placeholder="Buscar noticia" name="buscar" value="{{$buscar}}">
                        <div class="input-group-addon">
                            <button class="btn btn-info"><i class="fas fa-search"></i></button>
                            <a href="{{route('pedidos.admin')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i></a>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
                
            </div>
            <div class="row mt-4">
                <div class="col-lg-12">
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Código</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Cantidad de Productos</th>
                                <th class="text-center">Total</th>
                             
                            </tr>
                        </thead>
                        @foreach($pedidos as $item)
                            <tbody>
                                <tr>
                                    <td class="text-center">{{$item->nombre}} {{$item->apellidos}} | {{$item->email}}</td>
                                    <td class="text-center">{{strtoupper($item->codigo)}}</td>
                                    <td class="text-center">{{$item->fecha}}</td>
                                    <td class="text-center">{{$item->cantidad}}</td>
                                    <td class="text-center">
                                        {{$item->preciototal}}€
                                    </td>
                                   

                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                   
                </div>
                <div class="col-12 col-xl-12">
                    {{$pedidos->links()}}
                    
                </div>
            </div>

        </div>
    </main>
    
</div>

@endsection