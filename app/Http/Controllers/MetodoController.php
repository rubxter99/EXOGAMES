<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\DetallePedido;
use App\Models\Direccion;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Segunda;
use App\Models\Usuario;
use App\Rules\NifNie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MetodoController extends Controller
{
    public function index()//Mostrara al usuario con la sesion de cliente la comprobacion del metodo de credenciales del usuario actual 
    //junto con una breve sinopsis de su compra , si es administrador solo mostrara el dashboard
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {

                $carrito = Carrito::join('productos as p', 'carrito.idProducto', '=', 'p.id')->join('categorias as c', 'p.idCategoria', '=', 'c.id')->select('carrito.cantidad', 'p.imagen', 'p.nombre', 'p.precio', 'p.descripcion', 'c.nombre as categoria', 'p.fecha', 'carrito.id', 'carrito.idProducto')->where('idUsuario', auth()->user()->id)->get();
                $total = 0;
                foreach ($carrito as $det) {



                    if (!Producto::where('id', $det->idProducto)->where('stock', '>=', $det->cantidad)->exists()) {
                        $ncarrito = Carrito::where('idUsuario', auth()->user()->id)->where('idProducto', $det->idProducto)->first();
                        $ncarrito->delete();
                    }
                    $subtotal = $det->precio * $det->cantidad;
                    $total = $total + $subtotal;
                }
                $ncarrito = Carrito::join('productos as p', 'carrito.idProducto', '=', 'p.id')->join('categorias as c', 'p.idCategoria', '=', 'c.id')->select('carrito.cantidad', 'p.imagen', 'p.nombre', 'p.precio', 'p.descripcion', 'c.nombre as categoria', 'p.fecha', 'carrito.id', 'carrito.idProducto')->where('idUsuario', auth()->user()->id)->get();
                if(count($ncarrito)<=0){
                    return view('menu');
                }
                return view('metodo', compact('ncarrito', 'total'));
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return Redirect::to('');
        }
    }
    public function pedido(Request $request)//Creacion del pedido realizado despues de finalizar la compra del carrito del cliente actual
    // junto con la verificacion de sua direccion y la creacion de los detalles del pedido para mostrarlos en una tabla 
    //junto con la comprobacion de los datos del usuario.Posteriormente la eliminacion del carrito actual al finalizar
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required',
            'fecha' => 'required|date',
            'email' => 'required|email|string',
            'dni' => [new NifNie, 'string', 'nullable', 'max:255'],
            'telefono' => ['required', 'regex:/^([0-9]+)$/'],
            'codigoPostal' => ['required', 'regex:/^[0-5][1-9]{3}[0-9]$/'],

        ]);

        try {

            $pedido = new Pedido();
            $pedido->idUsuario = auth()->user()->id;
            $pedido->codigo = uniqid();
            $pedido->fecha = now();

            $total = 0;
            $carrito = Carrito::join('productos as p', 'carrito.idProducto', '=', 'p.id')->join('categorias as c', 'p.idCategoria', '=', 'c.id')->select('carrito.cantidad', 'carrito.idUsuario', 'p.imagen', 'p.nombre', 'p.precio', 'p.descripcion', 'c.nombre as categoria', 'p.fecha', 'p.stock', 'carrito.id', 'carrito.idProducto')->where('idUsuario', '=', auth()->user()->id)->orderby('id', 'desc')->get();

            foreach ($carrito as $producto) {
                $subtotal = $producto->precio * $producto->cantidad;
                $total = $total + $subtotal;
            }

            $pedido->preciototal = $total;

            $cantidades = [];

            foreach ($carrito as $deta) {
                array_push($cantidades, $deta->cantidad);
            }

            $suma = 0;
            foreach ($cantidades as $cant) {
                $suma += $cant;
            }
            $pedido->cantidad = $suma;




            if (Direccion::where('idUsuario', Auth::id())->exists()) {
                $direccion = Direccion::where('idUsuario',  Auth::id())->first();
                $direccion->idUsuario = auth()->user()->id;
                $direccion->codigoPostal = $request->get('codigoPostal');
                $direccion->pais = $request->get('pais');

                $direccion->localidad = $request->get('localidad');
                $direccion->update();
            } else {
                $direccion = new Direccion();
                $direccion->idUsuario = auth()->user()->id;
                $direccion->codigoPostal = $request->get('codigoPostal');
                $direccion->pais = $request->get('pais');

                $direccion->localidad = $request->get('localidad');
                $direccion->save();
            }

            $pedido->idDireccion = $direccion->id;
            $pedido->save();

            foreach ($carrito as $item) {
                DetallePedido::create([
                    'idPedido' => $pedido->id,
                    'idUsuario' => $item->idUsuario,
                    'idProducto' => $item->idProducto,
                    'cantidad' => $item->cantidad,
                    'precio' => $item->precio,
                    'fecha' => $item->fecha,
                ]);
                $producto = Producto::where('id', $item->idProducto)->first();
                $producto->stock = $producto->stock - $item->cantidad;
                $producto->update();
            }
            $comprobacion2 = Usuario::where('id', auth()->user()->id)->exists();
            if ($comprobacion2) {
                $usuario = Usuario::where('id',  Auth::id())->first();
                $usuario->nombre = $request->get('nombre');
                $usuario->apellidos = $request->get('apellidos');
                $usuario->email = $request->get('email');
                $usuario->telefono = $request->get('telefono');
                $usuario->dni = $request->get('dni');
                $usuario->fecha = $request->get('fecha');

                $usuario->update();
            } else {
                $usuario = new Usuario();
                $usuario->nombre = $request->get('nombre');
                $usuario->apellidos = $request->get('apellidos');
                $usuario->email = $request->get('email');
                $usuario->telefono = $request->get('telefono');
                $usuario->dni = $request->get('dni');
                $usuario->fecha = $request->get('fecha');

                $usuario->save();
            }

            Carrito::destroy($carrito);
            return Redirect::to('tienda')->with('success', 'Se ha realizado su pedido');
        } catch (\Exception $e) {
            dd($e);
            $request->session()->flash('danger', 'Hubo un error al completar el formulario');
            return redirect()->back();
        }
    }
    function segunda()//Mostrara al usuario con la sesion de cliente la comprobacion del metodo de credenciales del usuario actual
    // junto con una breve sinopsis de su venta del producto subido , si es administrador solo mostrara el dashboard
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {

                $segunda = Segunda::join('categorias as c', 'segunda_mano.idCategoria', '=', 'c.id')->select('segunda_mano.imagen', 'segunda_mano.nombre', 'segunda_mano.precio', 'segunda_mano.descripcion', 'c.nombre as categoria', 'segunda_mano.fecha', 'segunda_mano.id', 'segunda_mano.idUsuario')->where('segunda_mano.idUsuario', auth()->user()->id)->latest('segunda_mano.id')->first();

                if(count($segunda)<=0){
                    return view('');
                }
                return view('metodo_segunda', compact('segunda'));
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return Redirect::to('');
        }
    }
    public function pedido_segunda(Request $request)//Creacion del pedido realizado despues de la venta del producto de segunada mano del cliente actual 
    //junto con la verificacion de sua direccion y la creacion de los detalles del pedido para mostrarlos en una tabla junto con la comprobacion de los datos del usuario.

    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required',
            'fecha' => 'required|date',
            'email' => 'required|email|string',
            'dni' => [new NifNie, 'string', 'nullable', 'max:255'],
            'telefono' => ['required', 'regex:/^([0-9]+)$/'],
            'codigoPostal' => ['required', 'regex:/^[0-5][1-9]{3}[0-9]$/'],

        ]);

        try {


            $pedido_segunda = new Pedido();
            $pedido_segunda->idUsuario = auth()->user()->id;

            $pedido_segunda->codigo = uniqid();
            $pedido_segunda->fecha = now();


            $segunda = Segunda::join('categorias as c', 'segunda_mano.idCategoria', '=', 'c.id')->select('segunda_mano.imagen', 'segunda_mano.nombre', 'segunda_mano.precio', 'segunda_mano.descripcion', 'c.nombre as categoria', 'segunda_mano.fecha', 'segunda_mano.id', 'segunda_mano.idUsuario')->where('segunda_mano.idUsuario', auth()->user()->id)->latest('segunda_mano.id')->first();
            $pedido_segunda->idSegunda = $segunda->id;
            $pedido_segunda->preciototal = $segunda->precio;

            $pedido_segunda->cantidad = 1;

            if (Direccion::where('idUsuario', Auth::id())->exists()) {
                $direccion = Direccion::where('idUsuario',  Auth::id())->first();
                $direccion->idUsuario = auth()->user()->id;
                $direccion->codigoPostal = $request->get('codigoPostal');
                $direccion->pais = $request->get('pais');

                $direccion->localidad = $request->get('localidad');
                $direccion->update();
            } else {
                $direccion = new Direccion();
                $direccion->idUsuario = auth()->user()->id;
                $direccion->codigoPostal = $request->get('codigoPostal');
                $direccion->pais = $request->get('pais');

                $direccion->localidad = $request->get('localidad');
                $direccion->save();
            }

            $pedido_segunda->idDireccion = $direccion->id;
            $pedido_segunda->save();

            $comprobacion2 = Usuario::where('id', auth()->user()->id)->exists();
            if ($comprobacion2) {
                $usuario_segunda = Usuario::where('id',  Auth::id())->first();
                $usuario_segunda->nombre = $request->get('nombre');
                $usuario_segunda->apellidos = $request->get('apellidos');
                $usuario_segunda->email = $request->get('email');
                $usuario_segunda->telefono = $request->get('telefono');
                $usuario_segunda->dni = $request->get('dni');
                $usuario_segunda->fecha = $request->get('fecha');

                $usuario_segunda->update();
            } else {
                $usuario_segunda = new Usuario();
                $usuario_segunda->nombre = $request->get('nombre');
                $usuario_segunda->apellidos = $request->get('apellidos');
                $usuario_segunda->email = $request->get('email');
                $usuario_segunda->telefono = $request->get('telefono');
                $usuario_segunda->dni = $request->get('dni');
                $usuario_segunda->fecha = $request->get('fecha');

                $usuario_segunda->save();
            }


            return Redirect::to('segunda')->with('success', 'Se ha realizado su venta');
        } catch (\Exception $e) {
            dd($e);
            $request->session()->flash('danger', 'Hubo un error al completar el formulario');
            return redirect()->back();
        }
    }
}
