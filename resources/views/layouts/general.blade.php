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


    <header id="general" class="sticky-top">


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
    @yield('general-content')

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

    @stack('scripts')
</body>

</html>