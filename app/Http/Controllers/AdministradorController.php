<?php

namespace App\Http\Controllers;

use App\Models\Cancelar;
use App\Models\DetallePedido;
use App\Models\Mensaje;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AdministradorController extends Controller
{
    public function __construct()//comprobacion de roles y logeo
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                return view('dashboard');
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
    }




   

    public function pedidos(Request $request)//Mostara el listado de los pedidos en el panel de administrador junto con su busqueda
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                try {
                    if ($request) {
                        $buscar = $request->get('buscar');
                        $pedidos =  Pedido::join('detalle as de', 'pedidos.id', '=', 'de.idPedido')->join('productos as pr', 'de.idProducto', '=', 'pr.id')
                            ->join('usuarios as u', 'pedidos.idUsuario', '=', 'u.id')
                            ->select('pedidos.preciototal', 'pedidos.cantidad', 'pedidos.fecha', 'pedidos.codigo', 'pedidos.id', 'u.nombre', 'u.apellidos', 'u.email')->where('pedidos.codigo', 'LIKE', '%' . $buscar . '%')
                            ->orderby('pedidos.id', 'desc')
                            ->paginate(15);
                    }
        
                    return view('admin.pedidos.index', compact('buscar', 'pedidos'));
                } catch (\Exception $e) {
                    dd($e);
                }
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
        
    }






    public function mensajes(Request $request)//Mostara el listado de los mensajes en el panel de administrador junto con su busqueda
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                if ($request) {
                    $buscar = $request->get('buscar');
                    $mensajes = Mensaje::where('email', 'LIKE', '%' . $buscar . '%')->orderBy('id', 'desc')->paginate(20);
                }
        
        
                return view('admin.mensajes', compact('mensajes', 'buscar'));
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
      
    }
    public function usuarios()//Mostara el listado de los usuarios en el panel de administrador junto con su busqueda
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {
                $usuarios = Usuario::orderBy('id', 'desc')->paginate(20);

                return view('admin.usuario.index', compact('usuarios'));
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
        
    }
    public function dash() //Muestra generica de la vista de Dashboard junto con los productos,usuarios,pedidos y 
    //disponibilidad de añadir tanto productos como usuarios en el dashboard del administrador
    {


        // for ($page=1; $page <2 ; $page++) { 
        //     $url='https://api.rawg.io/api/games?key=d4598e3163664d11a6180a56e2921ea5&page_size=50&page='.$page;
        //     $productosdash=Http::get(''.$url.'');

        //     $productosdashArray=$productosdash->json();
        //     var_dump(count($productosdashArray['results']));
        // }
        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                $usuariosdash = Usuario::orderBy('id', 'desc')->paginate(20);
                $usuariosdashcount = Usuario::orderBy('id', 'desc')->get();
        
                $pedidosdash = Pedido::where('pedidos.idSegunda',null)->get();
                $pedidos_segundadash = Pedido::join('segunda_mano as s', 'pedidos.idSegunda', '=', 's.id')->get();
                  
        
               
                $productosdash = Producto::orderBy('id', 'desc')->paginate(10);
        
               $productosdashcount = Producto::orderBy('id', 'desc')->get();
        
                // $page1 = 1; INTENTE HACER UNA CONSULTA A UNA APIREST PERO SUGERI MEJOR LA CREACION DE LOS DATOS LOCALMENTE DESDE EL ADMINISTRADOR
        
                // $url1 = 'https://api.rawg.io/api/games?key=d4598e3163664d11a6180a56e2921ea5&page_size=50&page=' . $page1;
                // $productosdash1 = Http::get('' . $url1 . '');
        
                // $productosdashArray1 = $productosdash1->json();
        
                // $page2 = 2;
        
                // $url2 = 'https://api.rawg.io/api/games?key=d4598e3163664d11a6180a56e2921ea5&page_size=50&page=' . $page2;
                // $productosdash2 = Http::get('' . $url2 . '');
        
                // $productosdashArray2 = $productosdash2->json();
                // do{
        
                //     $url='https://api.rawg.io/api/games?key=d4598e3163664d11a6180a56e2921ea5&page_size=50&page='.$page;
                //     $productosdash=Http::get(''.$url.'');
        
                //     $productosdashArray=$productosdash->json();
                //     $page++;
        
        
                // }while($page ==2);
        
                return view('dashboard', compact('usuariosdash','usuariosdashcount', 'pedidosdash','productosdash','productosdashcount','pedidos_segundadash'));
           
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
    }
}
