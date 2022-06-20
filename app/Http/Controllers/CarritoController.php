<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\carritoPedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller //Cada carrito de cada usuario se almacena localmnete en la bbdd aunque se cierre sesion volvera a aparecer
{
    public function index()//Mostrará al cliente actual  la vista de los productos detallada individualmente en su carrito  junto con el total
    // y subtotal de todos los productos junto con su cantidad
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {


                $carritototal = Carrito::where('idUsuario', '=', auth()->user()->id)->get();

                $ncompras = count($carritototal);


                $total = 0;

                $carrito = Carrito::join('productos as p', 'carrito.idProducto', '=', 'p.id')->join('categorias as c', 'p.idCategoria', '=', 'c.id')->select('carrito.cantidad', 'p.imagen', 'p.nombre', 'p.precio', 'p.descripcion', 'c.nombre as categoria', 'p.fecha', 'p.stock', 'carrito.id', 'carrito.idProducto')->where('idUsuario', '=', auth()->user()->id)->orderby('id', 'desc')->get();


                foreach ($carrito as $det) {
                    $subtotal = $det->precio * $det->cantidad;
                    $total = $total + $subtotal;
                }

                $productos = [];
                $cantidades = [];

                foreach ($carrito as $deta) {
                    array_push($productos, $deta->idproducto);
                    array_push($cantidades, $deta->cantidad);
                }

                $suma = 0;
                foreach ($cantidades as $cant) {
                    $suma += $cant;
                }




                return view('carrito', compact('carrito', 'ncompras', 'total', 'cantidades', 'productos', 'suma'));
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('menu');
        }
    }
    public function agregar_carrito(Request $request)//Agregara al carrito del cliente actual el producto anteriormente comprado y 
    //si existe se actualizara sumandole la cantidad a este mismo
    {

        $request->validate([
            'idProducto' => 'required',

        ]);

        try {

            $comprobacion = Carrito::where('idProducto', $request->get('idProducto'))->where('idUsuario', auth()->user()->id)->exists();
            if ($comprobacion) {
                $carrito = Carrito::where('idProducto', $request->get('idProducto'))->where('idUsuario',  Auth::id())->first();
                $carrito->increment('cantidad');
                $carrito->update();
                return redirect()->back();
            } else {
                $carrito = new Carrito();
                $carrito->idProducto = $request->get('idProducto');
                $carrito->idUsuario = auth()->user()->id;
                $carrito->cantidad = $request->get('cantidad');
                $carrito->save();
            }



            return redirect()->back()->with('success', 'El producto se agregó al carrito.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('danger', 'Ocurrió un error al agregarlo al carrito.');
        }
    }

    public function quitar_carrito($id)//Eliminara el producto seleccionado del carrito actual del cliente
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->delete();
        return redirect()->back();
    }
    public function aumentar_cantidad($id, Request $request)//Aumenta la cantidad del producto seleccionado en el carrito actual del cliente y
    // comprobara si se puede o no aumentar la cantidad debido a su stock
    {

        $request->validate([
            'idProducto' => 'required',

        ]);
        $producto = Producto::findOrFail($request->get('idProducto'));

        if (Auth::check()) {
            $stock = $producto->stock;
            if ($request->get('pcantidad') > $stock) {

                return redirect()->back()->with('danger', 'No puede superar el stock actual.');
            } else {
                $carrito = Carrito::findOrFail($id);
                $carrito->increment('cantidad');
                $carrito->update();

                return redirect()->back();
            }
        }
    }
    public function reducir_cantidad($id, Request $request) //Reduce la cantidad del producto seleccionado del carrito actual y
    // comprueba si la cantidad es menor a 1 no lo realizara junto con la comprobacion de stock en la vista
    {
        $request->validate([
            'idProducto' => 'required',

        ]);
        $producto = Producto::findOrFail($request->get('idProducto'));

        if (Auth::check()) {
            if ($request->get('pcantidad') <= 1) {

                return redirect()->back();
            } else {
                $carrito = Carrito::findOrFail($id);
                $carrito->decrement('cantidad');
                $carrito->update();
                return redirect()->back();
            }
        }
    }
}
