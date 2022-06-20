@extends('layouts.admin')
@section('admin')
<div class="main mb-4">
    @include('layouts.nav')
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    <i class="far fa-envelope"></i> Bandeja de entrada</i> 
                </h1>
                <p class="header-subtitle">Mensajes de usuarios.</p>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-info alert-outline alert-dismissible" role="alert">
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        {{Session::get('success')}}
                    </div>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    {!! Form::open(array('url'=>'admin/mensajes','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                    <div class="input-group" id="show_hide_password">
                        <input class="form-control" type="text" placeholder="Buscar noticia" name="buscar" value="{{$buscar}}">
                        <div class="input-group-addon">
                            <button class="btn btn-info"><i class="fas fa-search"></i></button>
                            <a href="{{route('mensajes')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i></a>
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
                                <th class="text-center">Nombres completos</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        @foreach($mensajes as $item)
                            <tbody>
                                <tr>
                      
                                    <td class="text-center">{{$item->nombre}}</td>
                                    <td class="text-center">{{$item->email}}</td>
                                    <td class="text-center">{{$item->telefono}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#msm-{{$item->id}}"><i class="fas fa-eye"></i></button>
                                    </td>

                                    <div class="modal fade" id="msm-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Mensaje</h5>
													<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                    </button>
												</div>
												<div class="modal-body m-3">
													<p class="mb-0"><?php echo $item->asunto?></p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
												
												</div>
											</div>
										</div>
									</div>

                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    {{$mensajes->render()}}
                </div>
            </div>
            

        </div>
    </main>
    
</div>

@endsection