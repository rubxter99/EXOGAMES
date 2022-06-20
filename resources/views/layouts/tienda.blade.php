<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>EXOGAMES - Tienda de Videojuegos</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/icons/favicon.ico')}}">

    <script type="text/javascript">
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700', 'Segoe Script:300,400,500,600,700']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>


    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>



    <!-- Main CSS File -->
    <link href="{{ asset('css/personalizar/app.css') }}" rel="stylesheet">




</head>

<body>


    <header id="tienda" class="sticky-top">


        <nav>
            <div class="general tienda">
                <a href="{{route('tienda')}}">
                    <div class="icono"><img src="{{asset('img/usuarios/iconos/icono-1.svg')}}"></div>
                    <div class="titulo-icono">
                        <p>TIENDA</p>
                    </div>
                </a>
            </div>
            <div class="general noticias">
                <a href="{{route('noticias')}}">
                    <div class="icono"><img src="{{asset('img/usuarios/iconos/icono-2.svg')}}"></div>
                    <div class="titulo-icono">
                        <p>NOTICIAS</p>
                    </div>
                </a>
            </div>
            <div class="general logo">
                <a href="{{route('menu')}}">
                    <div class="titulo-icono">
                        <p>EXOGAMES</p>
                    </div>
                </a>
            </div>
            <div class="general mano">
                @if (!Auth::check())
                <a href="{{route('login')}}">
                    <div class="icono"><img src="{{asset('img/usuarios/iconos/icono-3.svg')}}"></div>
                    <div class="titulo-icono">
                        <p>2A MANO</p>
                    </div>
                </a>
                @else
                <a href="{{route('segunda')}}">
                    <div class="icono"><img src="{{asset('img/usuarios/iconos/icono-3.svg')}}"></div>
                    <div class="titulo-icono">
                        <p>2A MANO</p>
                    </div>
                </a>
                @endif

            </div>
            @if (Auth::check())
            <div class=" general carrito dropdown cart-dropdown">
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <span class="cart-count"><?php echo $ncompras ?></span>
                </a>

                <div class="dropdown-menu" >
                    <div class="dropdownmenu-wrapper">
                        <div class="dropdown-cart-products">

                            @if (count($carrito)>0)
                            @foreach ($carrito as $detaprin)
                            <div class="product">
                                <div class="detalles">
                                    <h4 class="p-titulo">
                                        <a href="">{{$detaprin->nombre}}</a>
                                    </h4>

                                    <span class="p-info">
                                        <span class="cart-product-qty">{{$detaprin->cantidad}}</span>
                                        x $<?php echo $detaprin->precio * $detaprin->cantidad ?>
                                    </span>
                                </div>

                                <div class="producto-contenido">

                                    <img src="{{asset('img/productos/'.$detaprin->imagen)}}" alt="product">

                                    <form action="{{route('quitar.carrito',$detaprin->id)}}" method="POST" style="margin-bottom: 0px !important; cursor:pointer">
                                        @csrf

                                        <input name="_method" type="hidden" value="DELETE">

                                        <button type="submit" class="btn-remove" title="Eliminar producto">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                            </svg></button>
                                    </form>

                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="producto">
                                <div class="p-detalles">
                                    <h4>vacio </h4>
                                </div>
                            </div>
                            @endif


                        </div>



                        <div class="dropdown-cart-action boton-carrito" style="margin-top:8px">
                            <a href="{{route('carrito')}}" class="btn">VER CARRITO</a>
                        </div>
                    </div>
                </div>

            </div>
            @endif
            <div class="general perfil">
                @if (!Auth::check())
                <div class="icono">
                    <a href="{{route('login')}}">
                        <img src="{{asset('img/usuarios/iconos/icono-4.svg')}}" class=" img-responsive mt-2">
                    </a>
                </div>


                @else
                <div class="icono-img"><a href="{{route('perfil')}}">
                        @if(auth()->user()->imagen!="")
                        <img src="{{asset('img/usuarios/clientes/'.auth()->user()->imagen)}}" class=" img-responsive mt-2">
                        @endif
                        @if(auth()->user()->imagen=="")
                        <img src="{{asset('img/usuarios/iconos/icono-4.svg')}}" class=" img-responsive mt-2">
                        @endif



                    </a>
                </div>

                @endif


            </div>


        </nav>

    </header>
    @yield('tienda-content')

    <footer class="footer-menu">

        <div class="titulo-footer">
            <a class="" href="{{route('menu')}}">
                <p>EXOGAMES</p>
            </a>
        </div>
        <div class="copy-footer">
            <p> Todos los derechos reservados a EXOGAMES ©2022</p>
        </div>
        <div class="pago-footer">
            <img src="{{asset('img/usuarios/payments.png')}}" alt="payment methods" class="footer-payments">
        </div>

    </footer>
    </div>



    <!-- Plugins JS File -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>



    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.min.js')}}"></script>
    <script src="{{asset('assets/js/nouislider.min.js')}}"></script>
    <script src="https://checkout.culqi.com/js/v3"></script>

    <script>
        $(document).ready(function() {

            $('.dropdown-toggle').click(function() {
            
                $('.dropdown-toggle').toggleAttr('aria-expnaded', "true");
                
            });

            
        });

    </script>
    @stack('scripts')
</body>

</html>