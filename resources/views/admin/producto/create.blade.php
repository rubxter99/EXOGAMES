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
                        <li class="breadcrumb-item active" aria-current="page">Registro</li>
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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-server"></i> Registro</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        {{--REGISTRO --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form method="POST" action="{{route('store.producto')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mt-4">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-9 form-group">
                                                        <label><b>Titulo del producto</b></label>
                                                        <input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" autocomplete="new-text" placeholder="nombre del producto" value="{{old('nombre')}}">
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
                                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
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
                                                        <input type="text" name="genero" class="form-control {{ $errors->has('genero') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('genero')}}" placeholder="Accion">
                                                        @if ($errors->has('genero'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('genero') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 form-group">
                                                        <label><b>Fecha</b></label>
                                                        <input type="date" name="fecha" class="form-control {{ $errors->has('fecha') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('fecha')}}" placeholder="0">
                                                        @if ($errors->has('fecha'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('fecha') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 form-group">
                                                        <label><b>Stock</b></label>
                                                        <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('stock')}}" placeholder="0">
                                                        @if ($errors->has('stock'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('stock') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 form-group">
                                                        <label><b>Precio</b></label>
                                                        <input type="number" name="precio" class="form-control {{ $errors->has('precio') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('precio')}}" placeholder="0.0">
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
                                                        <input type="text" name="demo" class="form-control {{ $errors->has('demo') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('demo')}}" placeholder="<iframe>">
                                                        @if ($errors->has('demo'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('demo') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3 form-group required-field val">
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


                                                        <input name="valoracion" hidden type="text" readonly class="form-control" id="valor" value="{{old('valoracion')}}">
                                                    </div>
                                                    <div class="col-lg-3 form-group">
                                                        <label><b>Trailer</b></label>
                                                        <input type="text" name="trailer" class="form-control {{ $errors->has('trailer') ? ' is-invalid' : '' }}" autocomplete="new-text" value="{{old('trailer')}}" placeholder="<iframe>">
                                                        @if ($errors->has('trailer'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('trailer') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <label><b>Descripcion</b></label>
                                                        <textarea name="descripcion" class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="Redacte una breve descripción" style="height:80px !important">{{old('descripcion')}}</textarea>
                                                        @if ($errors->has('descripcion'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <label><b>Comentario</b></label>
                                                        <textarea name="comentario" class="form-control {{ $errors->has('comentario') ? ' is-invalid' : '' }}" placeholder="Redacte un breve comentario" style="height:80px !important">{{old('comentario')}}</textarea>
                                                        @if ($errors->has('comentario'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('comentario') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>

                                                    <div class="col-lg-12 form-group">
                                                        <button class="btn btn-primary btn-lg" type="submit"><i class="fas fa-save"></i> Registrar</button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-12 form-group">
                                                        <div class="text-center">
                                                            <label><b>Portada</b></label>
                                                            <br>
                                                            <img src="{{asset('img/default.png')}}" class=" img-responsive mt-2" id="blah" width="150" height="190">
                                                            <div class="mt-2">
                                                                <input id="imgInp" class="btn btn-primary" type="file" name="imagen">
                                                            </div>

                                                            @if ($errors->has('imagen'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('imagen') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 form-group text-center">
                                                        <label><b>Galería</b></label>
                                                        <br>
                                                        <button id="btn_add" class="btn btn-success"><i class="fas fa-image"></i> Nueva imagen</button>
                                                        <hr>
                                                        <div class="row">
                                                            <table id="detalles" class="table table-sm">
                                                                <thead>
                                                                    <th>Opcion</th>
                                                                    <th>Archivo</th>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{--REGISTRO --}}


                    </div>
                </div>
            </div>

        </div>
    </main>

</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('#btn_add').click(function() {
            agregar();
        })
    });

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

    var cont = 0;
    $('#guardar').hide();

    function agregar() {
        var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont + ')">X</button></td><td><input required type="file" name="foto[]" class="form-control"></td></tr>'
        cont++;
        $('#detalles').append(fila);
    }


    function eliminar(index) {
        $('#fila' + index).remove();
        cont = -1;
    }

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
</script>
@endpush
@endsection