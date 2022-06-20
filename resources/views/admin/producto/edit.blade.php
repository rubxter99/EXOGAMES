@extends('layouts.admin')
@section('admin')
<div class="main">
    @include('layouts.nav')
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    Apartado de productos
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('index.producto')}}">Productos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Editar registro</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                @if(Session::has('danger'))
                <div class="col-lg-12 form-group">
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
                </div>
                @endif
                <div class="col-lg-12">
                    <form method="POST" action="{{route('update.producto',$producto->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-9 form-group">
                                                <label><b>Titulo del producto</b></label>
                                                <input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="nombre del producto" value="{{$producto->nombre}}">
                                                @if ($errors->has('nombre'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nombre') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-lg-3 form-group">
                                                <label><b>Categoría</b></label>
                                                <select name="idCategoria" class="form-control {{ $errors->has('idCategoria') ? ' is-invalid' : '' }}" autocomplete="new-text">
                                                    @foreach ($categorias as $item)
                                                    @if ($producto->idCategoria == $item->id)
                                                    <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
                                                    @else
                                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('idCategoria'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('idCategoria') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3 form-group">
                                                <label><b>Genero</b></label>
                                                <input type="text" name="genero" class="form-control {{ $errors->has('genero') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$producto->genero}}" placeholder="Accion">
                                                @if ($errors->has('genero'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('genero') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3 form-group">
                                                <label><b>Fecha</b></label>
                                                <input type="date" name="fecha" class="form-control {{ $errors->has('fecha') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$producto->fecha}}" placeholder="0">
                                                @if ($errors->has('fecha'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('fecha') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3 form-group">
                                                <label><b>Stock</b></label>
                                                <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$producto->stock}}" placeholder="0">
                                                @if ($errors->has('stock'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('stock') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3 form-group">
                                                <label><b>Precio</b></label>
                                                <input type="number" name="precio" class="form-control {{ $errors->has('precio') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$producto->precio}}" placeholder="0.0">
                                                @if ($errors->has('precio'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('precio') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-lg-3 form-group">
                                                <label><b>Estado</b></label>
                                                <input type="text" readonly value="ACTIVO" class="form-control">
                                            </div>
                                            <div class="col-lg-3 form-group">
                                                <label><b>Demo</b></label>
                                                <input type="text" name="demo" class="form-control {{ $errors->has('demo') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{$producto->demo}}" placeholder="<iframe>">
                                                @if ($errors->has('demo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('demo') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-3 form-group">
                                                <label for="acc-email">Valoracion</label>
                                                <div class="star">
                                                    <span clas="bistar" onclick="valorar(this)" style="cursor:pointer;" id="1estrella">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                    </span>
                                                    <span clas="bistar" onclick="valorar(this)" style="cursor:pointer;" id="2estrella">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                    </span>
                                                    <span clas="bistar" onclick="valorar(this)" style="cursor:pointer;" id="3estrella">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                    </span>
                                                    <span clas="bistar" onclick="valorar(this)" style="cursor:pointer;" id="4estrella">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                    </span>
                                                    <span clas="bistar" onclick="valorar(this)" style="cursor:pointer;" id="5estrella">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                    </span>
                                                </div>


                                                <input name="valoracion" hidden type="text" readonly class="form-control" id="valor" value="{{$producto->valoracion}}">
                                            </div>
                                            <div class="col-lg-3 form-group">
                                                <label><b>Trailer</b></label>
                                                <input type="text" name="trailer" class="form-control" autocomplete="new-text" value="{{$producto->trailer}}" placeholder="<iframe>">
                                               
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <label><b>Descripcion</b></label>
                                                <textarea name="descripcion" class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="Redacte una breve descripción" style="height:80px !important">{{$producto->descripcion}}</textarea>
                                                @if ($errors->has('descripcion'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 form-group">
                                                <label><b>Comentario</b></label>
                                                <textarea name="comentario" class="form-control {{ $errors->has('comentario') ? ' is-invalid' : '' }}" placeholder="Redacte un breve comentario" style="height:80px !important">{{$producto->comentario}}</textarea>
                                                @if ($errors->has('comentario'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('comentario') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-lg-12 text-center">
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
                                                    <img src="{{asset('img/productos/'.$producto->imagen)}}" class=" img-responsive mt-2" id="blah" width="150" height="190">
                                                    <div class="mt-2">
                                                        <input id="imgInp" class="btn btn-primary" type="file" name="imagen">
                                                    </div>
                                                    <small>For best results, use an image at least 128px by 128px in .jpg
                                                        format</small>
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
    var contador;

    function valorar(item) {

        var valor = document.getElementById('valor');

        contador = item.id[0];
        let estrella = item.id.substring(1);

        for (let i = 0; i < 5; i++) {

            if (i < contador) {
                document.getElementById((i + 1) + estrella).style.color = "yellow";
                document.getElementById((i + 1) + estrella).setAttribute("value", i + 1);
            } else {
                document.getElementById((i + 1) + estrella).style.color = "grey";
                document.getElementById((i + 1) + estrella).setAttribute("value", i + 1);
            }

        }
        valor.setAttribute("value", item.getAttribute("value"));

    }
    $("#imgInp").change(function() {
        readURL(this);
    });
</script>
@endpush
@endsection