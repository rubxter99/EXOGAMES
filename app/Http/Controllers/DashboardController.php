<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(){//Anterior controlador de administrador solo mostraba los usuarios de la bbdd en el panel administrador(actualmente utilizamos el AdministradorController)

        // $pedidos = Pedido::where('estado','=','Enviado')->get();

        // $devolucion = Pedido::where('estado','=','Reembolsado')->get();

        $usuarios = Usuario::where('rol','=','cliente')->get();

        // return view('dashboard',compact('pedidos','devolucion','usarios'));
      
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
    
   
}
