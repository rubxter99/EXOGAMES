<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Contacto;
use App\Models\Carrito;
use App\Models\Filtros;
use App\Models\Imagenes;
use App\Models\Producto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{



    public function index()//Comprobacion de los permisos de usuarios si es admin te lleva al dashborad y si es cliente te muestra la ventana de menu
    {

        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {

                return view('menu');
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('menu');
        }
    }


    public function tienda(Request $request)//Muestra los productos por filtrado con la opcion de comprarlos
    // y seleccion  de categoria si es consola o videojuego //si el usuario no ha iniciado sesion solo mostrara el listado con los filtros y las categorias sin la opcion de compra
    {

        if ($request) {
            if (Auth::check()) {
                if (auth()->user()->rol === "cliente") {
                    $carrito = Carrito::join('productos as p', 'carrito.idproducto', '=', 'p.id')->select('carrito.cantidad', 'p.imagen', 'p.nombre', 'p.precio', 'carrito.id')->where('idUsuario', '=', auth()->user()->id)->orderby('carrito.id', 'desc')
                        ->limit(2)->get();

                    $carritototal = Carrito::where('idUsuario', '=', auth()->user()->id)->get();

                    $ncompras = count($carritototal);
                    $buscar = $request->get('buscar');

                    $productos = Producto::where('nombre', 'LIKE', '%' . $buscar . '%')->paginate(20);

                    $categorias =  Categoria::orderby('nombre', 'asc')->get();

                    $destacados = Producto::orderby('valoracion', 'desc')->paginate(20);

                    $nuevos = Producto::orderby('fecha', 'desc')->paginate(20);

                    $demos = Producto::where('demo', 'LIKE', '%' . '<iframe' . '%')->paginate(20);

                    $tipo = $request->get('tipo');
                    if ($tipo != '') {
                        $buscar = $request->get('buscar');
                        $cat = Categoria::where('nombre', '=', $tipo)->first();
                        $productos = Producto::where([['idCategoria', '=', $cat->id],])->where('nombre', 'LIKE', '%' . $buscar . '%')->orderby('id', 'desc')->paginate(20);
                        $destacados = Producto::where([['idCategoria', '=', $cat->id],])->orderby('valoracion', 'desc')->paginate(20);

                        $nuevos = Producto::where([['idCategoria', '=', $cat->id],])->orderby('fecha', 'desc')->paginate(20);

                        $demos = Producto::where([['idCategoria', '=', $cat->id],])->where('demo', 'LIKE', '%' . '<iframe' . '%')->paginate(20);
                    }

                    return view('tienda', compact('carrito', 'ncompras', 'categorias', 'productos', 'buscar', 'destacados', 'nuevos', 'demos'));
                } else {
                    return redirect()->route('dashboard');
                }
            } else {
                $buscar = $request->get('buscar');

                $productos = Producto::where('nombre', 'LIKE', '%' . $buscar . '%')->paginate(20);

                $categorias =  Categoria::orderby('nombre', 'asc')->get();

                $destacados = Producto::orderby('valoracion', 'desc')->paginate(20);

                $nuevos = Producto::orderby('fecha', 'desc')->paginate(20);

                $demos = Producto::where('demo', 'LIKE', '%' . '<iframe' . '%')->paginate(20);

                $tipo = $request->get('tipo');
                if ($tipo != '') {
                    $buscar = $request->get('buscar');
                    $cat = Categoria::where('nombre', '=', $tipo)->first();
                    $productos = Producto::where([['idCategoria', '=', $cat->id],])->where('nombre', 'LIKE', '%' . $buscar . '%')->orderby('id', 'desc')->paginate(20);
                    $destacados = Producto::where([['idCategoria', '=', $cat->id],])->orderby('valoracion', 'desc')->paginate(20);

                    $nuevos = Producto::where([['idCategoria', '=', $cat->id],])->orderby('fecha', 'desc')->paginate(20);

                    $demos = Producto::where([['idCategoria', '=', $cat->id],])->where('demo', 'LIKE', '%' . '<iframe' . '%')->paginate(20);
                }

                return view('tienda', compact('categorias', 'productos', 'buscar', 'destacados', 'nuevos', 'demos'));
            }
        }
    }



    public function producto_individual($nombre) //Visualizacion del producto detallada con sus atributos y la opcion de demo para los videojegos.
    // Si el usuario ha iniciado sesion como cliente le mostrara la opcion de compra y poder añadirlo al carrito .Si no tiene la sesion solo podra visualizarlo
    {
       


        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {

                $carrito = Carrito::join('productos as p', 'carrito.idproducto', '=', 'p.id')->select('carrito.cantidad', 'p.imagen', 'p.nombre', 'p.precio', 'carrito.id')->where('idUsuario', '=', auth()->user()->id)->orderby('carrito.id', 'desc')
                    ->limit(2)->get();

                $carritototal = Carrito::where('idUsuario', '=', auth()->user()->id)->get();
                $individual = Producto::where('nombre', '=', $nombre)->firstOrFail();
                $categorias = Categoria::where('id', '=', $individual->idCategoria)->firstOrFail();
                $imagenes = Imagenes::where('idProducto', '=', $individual->id)->get();
                $ncompras = count($carritototal);
                return view('individual', compact('individual', 'imagenes', 'categorias', 'ncompras', 'carrito'));
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            $individual = Producto::where('nombre', '=', $nombre)->firstOrFail();
            $categorias = Categoria::where('id', '=', $individual->idCategoria)->firstOrFail();
            $imagenes = Imagenes::where('idProducto', '=', $individual->id)->get();
            return view('individual', compact('individual', 'imagenes', 'categorias'));
        }
    }

    public function contacto()//Muestra  a los clientes la vista de contacto sobre nosotros  sin embargo si es administrador solo llevara al dashbrad del admin
    {

        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {

                return view('contacto');
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('menu');
        }
    }

    public function contacto_send(Request $request)//Envia el formulario en la ventana de contacto sobre nosotros al administrador que mas tarde lo podra visualizar en su panel
    {

        $validator = $request->validate([
            'nombre' => 'required|min:5|max:250',
            'correo' => 'required|email|max:100',
            'telefono' => 'required|max:15',
            'asunto' => 'required',
        ]);

        try {

            $contacto = new Contacto();
            $contacto->nombre = $request->get('nombre');
            $contacto->email = $request->get('correo');
            $contacto->telefono = $request->get('telefono');
            $contacto->asunto = $request->get('asunto');
            $contacto->save($validator);

            $request->session()->flash('success', 'Su mensaje se envió a soporte, resivirá un mensaje en su bandeja.');
            return redirect()->back()->with('success', 'Su mensaje se envió a soporte, resivirá un mensaje en su bandeja.');
        } catch (\Exception $e) {

            $request->session()->flash('danger', 'Ocurrió un error al completar el formulario.');
            return redirect()->back()->with('danger', 'Ocurrió un error al completar el formulario.');
        }
    }

    // public function best_seller(){

    //     $productos = Producto::join('categoria','producto.idcategoria','=','categoria.id')
    //     ->select('producto.poster','categoria.titulo as categoria','producto.titulo','producto.slug','producto.precio_ahora','producto.id','producto.precio_antes')->orderby('num_ventas','desc')->take(16)->get();

    //     return view('best-seller',compact('productos'));
    // }
}
