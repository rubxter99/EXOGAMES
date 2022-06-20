<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">



	<title>EXOGAMES - Tienda de Videojuegos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


	<link rel="stylesheet" href="{{asset('css/admin.css')}}">

	<link rel="stylesheet" href="{{asset('css/modern.css')}}">
	<style>
		body {
			opacity: 0;
		}

		.hamburger,
		.hamburger:after,
		.hamburger:before {
			background: white !important;
		}

		h2 {
			color: white;
		}

		#titulo {
			height: 79px;
			background: #283559;
		}

		#titulo2 {
			font-size: 31px;
			background: #283559;
			text-align: center;
		}

		.sidebar-content,
		.sidebar-nav {
			background: #403557 !important;
			padding-top: 10px;

		}

		.sidebar-item {
			padding: 10px;


		}

		.hidden {
			display: none;

		}

		a:not([href]):not([tabindex]),
		a:not([href]):not([tabindex]):focus,
		a:not([href]):not([tabindex]):hover {
			color: white;

		}

		.sidebar-link,
		a.sidebar-link {

			background-color: #312842;
			color: white;
		}

		.h-100 {
			height: 200px !important;
		}

		.content {
			padding-bottom: 50px;
		}

		.error {
			color: red;
			font-weight: 400;
			display: block;
			padding: 6px 0;
			font-size: 14px;
		}

		.form-control.error {
			border-color: red;
			padding: .375rem .75rem;
		}
		.table{
			color: grey;
		}
	</style>

</head>

<body>


	<div class="wrapper" id="mainadmin">
		<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand " id="titulo">


			</a>
			<div class="sidebar-content" id="menu">


				<ul class="sidebar-nav">




					<li class="sidebar-item {{ request()->is('admin/productos') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('index.producto')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3-event-fill align-middle mr-2  text-white" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2h16a2 2 0 0 0-2-2H2zM0 14V3h16v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm12-8a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" />
							</svg> <span class="align-middle">PRODUCTOS</span>

						</a>
					</li>
					<li class="sidebar-item {{ request()->is('admin/usuarios') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('index.usuario')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people align-middle mr-2  text-white" viewBox="0 0 16 16">
								<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
							</svg><span class="align-middle">USUARIOS</span>

						</a>
					</li>

					<li class="sidebar-item {{ request()->is('admin/pedidos') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('pedidos.admin')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ol  mr-2  text-white" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
								<path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
							</svg></i> <span class="align-middle">PEDIDOS</span>

						</a>
					</li>
					<li class="sidebar-item {{ request()->is('admin/noticias') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('index.noticia')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper align-middle mr-2  text-white" viewBox="0 0 16 16">
								<path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
								<path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
							</svg> <span class="align-middle">NOTICIAS</span>
						</a>
					</li>
					<li class="sidebar-item {{ request()->is('admin/mensajes') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('mensajes')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope  mr-2  text-white" viewBox="0 0 16 16">
								<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
							</svg></i> <span class="align-middle">MENSAJES</span>
						</a>
					</li>

				</ul>
			</div>
		</nav>


		@yield('admin')

	</div>


	<script src="{{ asset('js/app.js') }}"></script>


	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>


	<script>
		$(document).ready(function() {

			$("#toggle").click(function() {
				$("#sidebar").toggleClass("toggled");

			});

			// $('.dropdown-item').click(function() {
			// 	$("body").toggleClass("modal-open");
			// 	$(".modal.fade").toggleClass("show");
			// 	$(".modal.fade").show();
			// });
			$('.close').click(function() {


				$(".modal.fade").hide();
			});

			$("#crear").click(function() {
				$("#crear").toggleClass("show");
				$("#registrar").toggleClass("show");
			});

			for (let index = 0; index < 200; index++) {

				$("#" + index).click(function() {
					$("#" + index).toggleClass("show");
					$("#" + index + "_txt").toggleClass("show");


				});
			}



			$("#userDropdown").click(function() {
				$(".nav-item.dropdown.ml-lg-2").toggleClass("show");
				$(".dropdown-menu.dropdown-menu-right").toggleClass("show");
			});

		});
	</script>
	@stack('scripts')
	<style>
		.invalid-feedback {
			display: block;
		}
	</style>
</body>

</html>