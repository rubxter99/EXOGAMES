<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MetodoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//LOGIN Y REGISTRO
Auth::routes();/*se almacenan las siguientes rutas:
Para LoginContoller
GET /login ->Para mostrar el formulario
POST /login ->Donde se envia el formulario
POST /logout ->Para cerrar sesion
Para RegisterController
GET /register ->Para mostrar el formulario
POST ->Donde se envia el formulario
*/

//RUTAS PARA EL USUARIO
// Ruta a la vista del menu/home que mostrara nuestra web al ser usuario
Route::get('',[HomeController::class, 'index'])->name('menu');

// Ruta a la vista de la pagina de noticias 
Route::get('noticias',[NoticiaController::class, 'mostrar'])->name('noticias');

// Ruta a la vista de la pagina de contacto 
Route::get('contacto',[HomeController::class, 'contacto'])->name('contacto');

// Ruta con la funcionalidad de enviar un mensaje al administrador mediante el formalurion de la pagina contacto
Route::post('contacto',[HomeController::class, 'contacto_send'])->name('contacto.send');

// Ruta a la vista de la pagina de perfil del usuario 
Route::get('perfil',[UsuarioController::class, 'mostrar_perfil'])->name('perfil');

// Ruta a la funcion que actualizara el perfil del usuario
Route::patch('perfil',[UsuarioController::class, 'update_usuario'])->name('perfil.edit');

// Ruta a la vista de los pedidos realizados por el usuario 
Route::get('perfil/pedido/{id}',[UsuarioController::class, 'mostrar_pedido'])->name('perfil.pedido');

// Ruta a la vista de los productos de segunda mano realizados por el usuario 
Route::get('perfil/pedido_segunda/{id}',[UsuarioController::class, 'mostrar_pedido_segunda'])->name('perfil.pedido_segunda');

// Ruta a la vista de la pagina de segunda mano 
Route::get('segunda',[ProductoController::class, 'mostrar'])->name('segunda');

// Ruta a la funcion que creara un producto de segunda mano por el usuario
Route::post('segunda',[ProductoController::class, 'vendidos'])->name('segunda.create');

// Ruta a la vista de la pagina de metodo de pago de los los productos vendidos
Route::get('metodo/segunda',[MetodoController::class, 'segunda'])->name('metodo.segunda');

// Ruta que actuara como funcionalidad de comprobacion de datos del usuario insertados en el formulario de metodo de pago para los productos de segunda mano
Route::post('metodo/segunda',[MetodoController::class, 'pedido_segunda'])->name('comprobar.segunda');

// Ruta a la vista de la pagina de tienda de productos 
Route::get('tienda',[HomeController::class, 'tienda'])->name('tienda');

// Ruta a la vista de la pagina del producto seleccionado mas detalladamente con su demo
Route::get('tienda/{id}',[HomeController::class, 'producto_individual'])->name('individual');

// Ruta a la vista de la pagina de carrito de productos 
Route::get('carrito',[CarritoController::class, 'index'])->name('carrito');

// Ruta a la vista de la pagina de carrito de productos 
Route::post('tienda/carrito',[CarritoController::class, 'agregar_carrito'])->name('agregar.carrito');

// Ruta que llamara a la funcion de aumento de cantidad de un producto seleccionado en el carrito y comprobacion de stock
Route::post('carrito/aumentar/{id}',[CarritoController::class, 'aumentar_cantidad'])->name('aumentar.carrito');

// Ruta que llamara a la funcion de reducir la cantidad de un producto seleccionado en el carrito y comprobacion de stock
Route::post('carrito/reducir/{id}',[CarritoController::class, 'reducir_cantidad'])->name('reducir.carrito');

// Ruta que llamara a la funcion de eliminar el producto seleccionado y eliminadnolo del carrito
Route::delete('tienda/carrito/eliminar/{id}',[CarritoController::class, 'quitar_carrito'])->name('quitar.carrito');

// Ruta a la vista de la pagina de metodo de pago despues de finalizar el carrito 
Route::get('metodo',[MetodoController::class, 'index'])->name('metodo');

// Ruta que actuara como funcionalidad de comprobacion de datos del usuario insertados en el formulario de metodo de pago
Route::post('metodo',[MetodoController::class, 'pedido'])->name('comprobar');






//RUTAS PARA EL ADMIN

// Ruta a la vista del panel del admin
Route::get('dashboard',[AdministradorController::class, 'dash'])->name('dashboard');

//Ruta a la vista del listado de mensajes recibidos por el formulario de conocenos mostrados al admin
Route::get('admin/mensajes',[AdministradorController::class, 'mensajes'])->name('mensajes');

//Ruta a la vista del listado de usuarios en el panel de admin
Route::get('admin/usuario', [UsuarioController::class, 'index'])->name('index.usuario');

//Ruta a la vista del registro de un nuevo usuario en la bbdd en el panel de admin
Route::get('admin/usuario/registrar',[UsuarioController::class, 'create'])->name('create.usuario');

//Ruta a la  funcion de la creacion de un nuevo usuario en la bbdd en el panel de admin
Route::post('admin/usuario/registrar',[UsuarioController::class, 'store'])->name('store.usuario');

//Ruta a la vista de editar el usuario  en el panel de admin
Route::get('admin/usuario/{id}',[UsuarioController::class, 'edit'])->name('edit.usuario');

//Ruta a la funcion de editar el usuario  en el panel de admin
Route::patch('admin/usuario/{id}',[UsuarioController::class, 'update'])->name('update.usuario');

//Ruta a la funcion de eliminar el usuario  en el panel de admin
Route::delete('admin/usuario/eliminar/{id}',[UsuarioController::class, 'destroy_usuario'])->name('usuarios.eliminar');

//Ruta a la vista del listado de pedidos en el panel administrador
Route::get('admin/pedidos', [AdministradorController::class, 'pedidos'])->name('pedidos.admin');

//Ruta a la vista del listado de productos en el panel de admin
Route::get('admin/producto',[ProductoController::class, 'index'])->name('index.producto');

//Ruta a la vista del registro de un nuevo producto en la bbdd en el panel de admin
Route::get('admin/producto/registrar',[ProductoController::class, 'create'])->name('create.producto');

//Ruta en la cual creara un nuevo producto
Route::post('admin/producto/registrar',[ProductoController::class, 'store'])->name('store.producto');

//Ruta en la cual eliminara el producto elegido
Route::delete('admin/producto/eliminar/{id}',[ProductoController::class, 'destroy_producto'])->name('productos.eliminar');

//Ruta en la cual se visualizara la vista de modificar el producto elegido
Route::get('admin/producto/{id}',[ProductoController::class, 'edit'])->name('edit.producto');

//Ruta en la cual actualizara el producto elegido
Route::patch('admin/producto/{id}',[ProductoController::class, 'update'])->name('update.producto');


//Ruta en la cual se visualizara la lista de todos las noticias en el panel administrador
Route::get('admin/noticia', [NoticiaController::class, 'index'])->name('index.noticia');

//Ruta en la cual se visualiza la vista de creacion de un nuevo post/noticia
Route::get('admin/noticia/registrar',[NoticiaController::class, 'create'])->name('create.noticia');

//Ruta definiendo la funcion que creara la noticia
Route::post('admin/noticia/registrar',[NoticiaController::class, 'store'])->name('store.noticia');

//Ruta en la cual se visualiza la vista de editar  la noticia seleccionada
Route::get('admin/noticia/{id}',[NoticiaController::class, 'edit'])->name('edit.noticia');

//Ruta en la cual se actualizara la noticia seleccionada
Route::patch('admin/noticia/{id}',[NoticiaController::class, 'update'])->name('update.noticia');

//Ruta en la cual se eliminara la noticia seleccionada
Route::delete('admin/noticia/eliminar/{id}',[NoticiaController::class, 'destroy_noticia'])->name('noticias.eliminar');