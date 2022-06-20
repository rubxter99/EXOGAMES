<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\DetallePedido;
use App\Models\Imagenes;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Segunda;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Stringable;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function __construct()//Muestra la ventana de segunda mano si ha iniciado sesion con el rolde cliente , sin embargo si no  tiene o es admin no lo mostrara
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {

                return view('segunda');
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('auth.login');
        }
    }

    function index(Request $request)//Muestra  el listado de productos del panel de administrador jutno con su busqueda por nombre de producto
    {
    
        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                if ($request) {

                    $buscar = $request->get('buscar');
                    $productos = Producto::where('nombre', 'LIKE', '%' . $buscar . '%')->paginate(10);

                    return view('admin.producto.index', compact('buscar', 'productos'));
                }
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
    }

    function create()//Vista de la creacion de un producto nuevo junto con sus campos requeridos
    {

        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                $categorias = Categoria::get();

                return view('admin.producto.create', compact('categorias'));
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
    }

    function store(Request $request)//Creacion del producto junto la validacion de sus campos en la vista de creacion de producto 
    //y la creacion de una galeria de imagenes a modo de screenshoot
    {
        $validator = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:100048',
            'stock' => 'required',
            'comentario' => 'required|max:500',

        ]);


        try {
            $imagenes = $request->imagen->extension();



            $imgname = uniqid();
            $producto = new Producto();
            $producto->nombre = $request->get('nombre');
            $producto->descripcion = $request->get('descripcion');
            $producto->idCategoria = $request->get('idCategoria');
            $producto->fecha = $request->get('fecha');
            $producto->genero = $request->get('genero');
            $producto->precio = $request->get('precio');
            $imgNombre = $imgname . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('img/productos/'), $imgNombre);
            $producto->imagen = $imgNombre;
            $producto->comentario = $request->get('comentario');
            $producto->stock = $request->get('stock');
            $producto->disponibilidad = 'DISPONIBLE';
            $producto->demo = $request->get('demo');
            $producto->valoracion = $request->get('valoracion');
            $producto->trailer = $request->get('trailer');
            $producto->save();


            try {


                $fotos = $request->file('foto');
                $registros = count($fotos);


                if ($request->hasFile('foto')) {

                    foreach ($fotos as $foto) {
                        $galeria = new Imagenes();
                        $galeria->idProducto = $producto->id;/*ID AUTOGENERADO*/
                        $codigo = uniqid();
                        $extension = $foto->getClientOriginalExtension();
                        $foto->move(public_path('img/galeria'), $codigo . "." . $extension);
                        $galeria->imagen = $codigo . "." . $extension;
                        $galeria->save();
                    }
                }
            } catch (\Exception $e) {

                dd($e);
                return redirect()->back()->with('danger', 'No ingresó imagenes para el producto');
            }

            return Redirect::to('admin/producto')->with('success', 'Se registró su producto con exito');
        } catch (\Exception $e) {
            dd($e);

            return redirect()->back()->with('danger', 'Hubo un error al completar el formulario');
        }
    }
    public function edit($id)//Vista de editar producto seleccionado anteriormente en el listado de productos del panel administrador con sus campos ya rellenos
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                $producto = Producto::where('id', $id)->firstOrFail();
                $categorias = Categoria::get();

                return view('admin.producto.edit', compact('producto', 'categorias'));
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
    }

    public function update(Request $request, $id)//Actualizara el producto seleccionado del listado del panel administrador 
    //junto con la comprobacion de la existencia de imagen del producto si posee o no se podra actualizar
    {

       
        try {
            $request->validate([
                'nombre' => 'required|max:250|unique:productos,nombre,' . $id . ',id',
                'descripcion' => 'required',
                'precio' => 'required',
                'imagen' => 'required|max:10000',
                'stock' => 'required',
                'comentario' => 'required|max:500',
    
            ]);
    
            $imgname = uniqid();
            if ($request->hasFile('imagen')) {

                $imagen = $request->imagen->extension();

                if ($imagen == 'png' || $imagen == 'jpeg' || $imagen == 'jpg' || $imagen == 'webp') {

                    $producto = Producto::where('id', $id)->firstOrFail();
                    $producto->nombre = $request->get('nombre');
                    $producto->descripcion = $request->get('descripcion');
                    $producto->idCategoria = $request->get('idCategoria');
                    $producto->fecha = $request->get('fecha');
                    $producto->genero = $request->get('genero');
                    $producto->precio = $request->get('precio');
                    $producto->comentario = $request->get('comentario');
                    $producto->stock = $request->get('stock');
                    $producto->disponibilidad = 'DISPONIBLE';
                    $producto->demo = $request->get('demo');
                    $producto->valoracion = $request->get('valoracion');
                    $producto->trailer = $request->get('trailer');

                    try {
                        unlink(public_path('img/productos/' . $producto->imagen));
                    } catch (\Exception $e) {
                    }

                    $imagenName = $imgname . '.' . $request->imagen->extension();
                    $request->imagen->move(public_path('img/productos/'), $imagenName);
                    $producto->imagen = $imagenName;
                    $producto->update();


                    $request->session()->flash('success', 'Se actualizó su producto con exito');
                    return Redirect::to('admin/producto');
                } else {
                    $request->session()->flash('danger', 'El formato de las imagenes no estan aceptadas');
                    return redirect()->back();
                }
            } else {



                $producto = Producto::where('id', $id)->firstOrFail();
                $producto->nombre = $request->get('nombre');
                $producto->descripcion = $request->get('descripcion');
                $producto->idCategoria = $request->get('idCategoria');
                $producto->fecha = $request->get('fecha');
                $producto->genero = $request->get('genero');
                $producto->precio = $request->get('precio');
                $producto->comentario = $request->get('comentario');
                $producto->stock = $request->get('stock');
                $producto->disponibilidad = 'DISPONIBLE';
                $producto->demo = $request->get('demo');
                $producto->valoracion = $request->get('valoracion');
                $producto->trailer = $request->get('trailer');
                $producto->update();

                $request->session()->flash('success', 'Se actualizó su producto con exito');
                return Redirect::to('admin/producto');
            }
        } catch (\Exception $e) {
            dd($e);
            $request->session()->flash('danger', 'Hubo un error al completar el formulario');
            return redirect()->back();
        }
    }


    public function destroy_producto(Request $request, $id)//Eliminar producto seleccionado anteriormente en el listado de productos del admin en base a su id
    {

        $producto = Producto::findOrFail($id);
        try {
            unlink(public_path('img/galeria' . $producto->psoter));
        } catch (\Exception $e) {
        }
        $producto->delete();

        $request->session()->flash('success', 'Se eliminó el producto correctamente');
        return redirect()->back();
    }
    function mostrar()//Mostrara la ventana de segunda mano el slider de los productos que vendio el usuario actual con rol cliente despues del formulario de subida/venta
    {

        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {

                $productos_segunda = Segunda::where('idUsuario',auth()->user()->id)->get();
                $categorias = Categoria::get();


                return view('segunda', compact('productos_segunda', 'categorias'));
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('auth.login');
        }
    }

    function vendidos(Request $request)//Creacion de la subida de productos de segunda mano realizados con un formulario 
    // junto con su valoracion por estrellas y nos redigira al metod de verificaion de pedido de segunda mano
    {



        try {

            $request->validate([
                'nombre' => 'required',
                'idCategoria' => 'required',
                'precio' => 'required',
                'comentario' => 'nullable|max:500',
                'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:100048',
            ]);
            $imgname = uniqid();
            $producto_segunda = new Segunda();
            $producto_segunda->idUsuario = auth()->user()->id;
            $producto_segunda->nombre = $request->get('nombre');
            $producto_segunda->descripcion = $request->get('descripcion');
            $producto_segunda->valoracion = $request->get('valoracion');
            $producto_segunda->idCategoria = $request->get('idCategoria');
            $producto_segunda->fecha = now();
            $producto_segunda->precio = $request->get('precio');

            $imageName = $imgname . '.' . $request->fotico->extension();
            $request->fotico->move(public_path('img/productos_segunda/'), $imageName);
            $producto_segunda->imagen = $imageName;
            $producto_segunda->comentario = $request->get('comentario');


            $producto_segunda->save();



            return Redirect::to('metodo/segunda')->with('success', 'Se registró su producto con exito');
        } catch (\Exception $e) {
            dd($e);

            return redirect()->back()->with('danger', 'Hubo un error al completar el formulario');
        }
    }
}
