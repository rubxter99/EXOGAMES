<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Usuario;
use App\Rules\NifNie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    public function __construct()//Muestra la ventana de perfil del usuario si ha iniciado sesion con el rolde cliente 
    //, sin embargo si no  tiene  no lo mostrara y nos llevara al login
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {

                return view('perfil.index');
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('auth.login');
        }
    }
    function index(Request $request)//Muestra  el listado de usuarios del panel de administrador jutno con su busqueda por nombre de usuario
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                if ($request) {

                    $buscar = $request->get('buscar');
                    $usuarios = Usuario::where('email', 'LIKE', '%' . $buscar . '%')->paginate(20);
        
                    return view('admin.usuario.index', compact('buscar', 'usuarios'));
                }
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
        
    }
    function create()//Vista de la creacion de un usuario nuevo junto con sus campos requeridos
    {

        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                $usuarios = Usuario::get();

                return view('admin.usuario.create', compact('usuarios'));
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
      
    }
    function store(Request $request)//Creacion del usuario junto la validacion de sus campos en la vista de creacion de producto
    // y la creacion de una imagen a modo de icono personal
    {

        $this->validate($request, [
            'nombre' => 'required|min:3|max: 50',
            'apellidos' => 'required|min:3|max: 80',
            'email' => 'required|email',
            'password' => 'min:6|max:30',
            'telefono' => 'min:3|max: 15',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ]);


        try {

            $usuario = new Usuario();
            $usuario->nombre = $request->get('nombre');
            $usuario->apellidos = $request->get('apellidos');
            $usuario->email = $request->get('email');
            $usuario->telefono = $request->get('telefono');
            $usuario->rol = $request->get('rol');

            $usuario->password = bcrypt($request->get('password'));
            $imageName = time() . '.' . $request->imagen->extension();

            $request->imagen->move(public_path('img/usuarios/clientes'), $imageName);
            $usuario->imagen = $imageName;
            $usuario->save();


            return Redirect::to('admin/usuario')->with('success', 'Se registró su usuario con exito');
        } catch (\Exception $e) {
            dd($e);

            return redirect()->back()->with('danger', 'Hubo un error al completar el formulario');
        }
    }

    public function edit($id)//Vista de editar el usuario seleccionado anteriormente en el listado de usuarios del panel administrador con sus campos ya rellenos
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                $usuario = Usuario::where('id', $id)->firstOrFail();


                return view('admin.usuario.edit', compact('usuario'));
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
     
        
    }

    public function update(Request $request, $id)//Actualizara el usuario seleccionado del listado del panel administrador 
    //junto con la comprobacion de la existencia de imagen del usuario si posee o no se podra actualizar
    {

        $request->validate([
            'nombre' => 'required',
            'password' => 'required|min:5',
            // 'email' => 'required|email|unique:usuarios',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        try {

            $imgname = uniqid();

            if ($request->hasFile('icono')) {

                $imagen = $request->icono->extension();

                $usuario = Usuario::where('id', $id)->firstOrFail();
                $usuario->nombre = $request->get('nombre');
                $usuario->apellidos = $request->get('apellidos');
                $usuario->email = $request->get('email');
                $usuario->telefono = $request->get('telefono');
                $usuario->dni = $request->get('dni');
                $usuario->rol = $request->get('rol');
                $usuario->password = bcrypt($request->get('password'));
                try {
                    unlink(public_path('img/usuarios/clientes' . $usuario->imagen));
                } catch (\Exception $e) {
                }
                $imagenName = $imgname . '.' . $request->imagen->extension();
                $request->imagen->move(public_path('img/usuarios/clientes'), $imagenName);
                $usuario->imagen = $imagenName;
                $usuario->update();


                return redirect()->back()->with('success', 'Se actualizó su usuario con exito');
            } else {

                $usuario = Usuario::where('id', $id)->firstOrFail();
                $usuario->nombre = $request->get('nombre');
                $usuario->apellidos = $request->get('apellidos');
                $usuario->email = $request->get('email');
                $usuario->telefono = $request->get('telefono');
                $usuario->dni = $request->get('dni');
                $usuario->rol = $request->get('rol');
                $usuario->password = bcrypt($request->get('password'));
                $usuario->update();

                return Redirect::to('admin/usuario')->with('success', 'Se actualizó su usuario con exito');
            }
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('danger', 'Ocurrió un error al completar el formulario');
        }
    }
    public function destroy_usuario(Request $request, $id)//Eliminar el usuario seleccionado anteriormente en el listado de usuarios del admin en base a su id
    {

        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        $request->session()->flash('success', 'Se eliminó el usuario correctamente');
        return redirect()->back();
    }
    public function mostrar_perfil()//Mostrara el perfil del usuario cliente actual junto con sus pedido en forma de listado y los pedidos de segunda mano en forma de slider
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {
                $usuario = Usuario::findOrFail(auth()->user()->id);
              
                $pedidos = Pedido::where('pedidos.idSegunda',null)->where('idUsuario', auth()->user()->id)->get();
                $pedidos_segunda = Pedido::join('segunda_mano as s', 'pedidos.idSegunda', '=', 's.id')->where('pedidos.idUsuario', auth()->user()->id)->get();
              
                return view('perfil.index', compact('usuario','pedidos','pedidos_segunda'));
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('auth.login');
        }
    }
    public function mostrar_pedido($id)//Mostrara la vista del pedido seleccionado con el id de la lista de pedidos en el perfil del usaurio actual . 
    //Mostrando la informacion del cliente que realizo el pedido y los productos que contiene.
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {
        
                $pedidos = Pedido::join('detalle as d', 'pedidos.id', '=', 'd.idPedido')->
                join('productos as p', 'd.idProducto', '=', 'p.id')->join('categorias as c', 'p.idCategoria', '=', 'c.id')->
                select('p.imagen as imagen', 'p.nombre', 'd.precio','d.cantidad', 'c.nombre as categoria', 'p.fecha','pedidos.idUsuario','pedidos.preciototal as preciototal')->
                where('pedidos.id', '=',$id)->get();

                $usuarios = Usuario:: join('pedidos as pe', 'usuarios.id', '=', 'pe.idUsuario')->join('direccion as dir', 'pe.idDireccion', '=', 'dir.id')
                ->select('usuarios.nombre as nombre','usuarios.apellidos as apellidos','usuarios.fecha as fecha', 'usuarios.email as email', 'usuarios.dni as dni', 'usuarios.telefono as telefono', 'dir.localidad as localidad', 'dir.pais as pais', 'dir.codigoPostal as codigoPostal')
                ->where('usuarios.id',auth()->user()->id)->first();

                $total=Pedido::where('id', '=',$id)->first();
                
                return view('perfil.pedido', compact('pedidos','usuarios','total'));
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('menu');
        }
    }
    public function mostrar_pedido_segunda($id)//Mostrara la vista del pedido de sgunda mano seleccionado con el id del slider de productos subidos en el perfil del usaurio actual .
    // Mostrando la informacion del cliente que realizo el pedido  de la venta y los productos que contiene.
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {
        
                $pedidos_segunda = Pedido::join('segunda_mano as s', 'pedidos.idSegunda', '=', 's.id')->join('categorias as c', 's.idCategoria', '=', 'c.id')
                ->select('s.imagen as imagen','s.nombre as nombre','c.nombre as categoria', 's.valoracion as valoracion', 'pedidos.preciototal as precio', )->
                where('pedidos.idUsuario', auth()->user()->id)->where('pedidos.idSegunda',$id)->first();
              

                $usuarios_segunda = Usuario:: join('pedidos as pe', 'usuarios.id', '=', 'pe.idUsuario')->join('direccion as dir', 'pe.idDireccion', '=', 'dir.id')
                ->select('usuarios.nombre as nombre','usuarios.apellidos as apellidos','usuarios.fecha as fecha', 'usuarios.email as email', 'usuarios.dni as dni', 'usuarios.telefono as telefono', 'dir.localidad as localidad', 'dir.pais as pais', 'dir.codigoPostal as codigoPostal')
                ->where('usuarios.id',auth()->user()->id)->first();

            
                
                return view('perfil.pedido_segunda', compact('pedidos_segunda','usuarios_segunda'));
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('menu');
        }
    }
    public function update_usuario(Request $request)//Actualizara los campos del usuario actual con el formulario mostrado anteriormente en la ventana de perfil
    // logeado comprobando la imagen de este siendo necesaria o no
    {
        $request->validate([
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'nombre' => 'required',
            'apellidos' => 'required|max:30',
            'telefono' => 'required|min:3| max: 15',
            'dni' => [new NifNie, 'string', 'nullable', 'max:255'],


        ]);


        try {


            $imgname = uniqid();

            if ($request->hasFile('icono')) {

                $imagen = $request->icono->extension();



                $usuario = Usuario::findOrFail(auth()->user()->id);
                $usuario->nombre = $request->get('nombre');
                $usuario->apellidos = $request->get('apellidos');

                $usuario->telefono = $request->get('telefono');

                $usuario->dni = $request->get('dni');
                $usuario->rol = "cliente";


                try {
                    unlink(public_path('img/usuarios/clientes' . $usuario->imagen));
                } catch (\Exception $e) {
                }
                $imagenName = $imgname . '.' . $request->icono->extension();
                $request->icono->move(public_path('img/usuarios/clientes'), $imagenName);
                $usuario->imagen = $imagenName;
                $usuario->update();

                $request->session()->flash('success', 'Se actualizó sus datos de su perfíl');
                return redirect()->back()->with('successs', 'Se actualizó sus datos de su perfíl');
            } else {
                $usuario = Usuario::findOrFail(auth()->user()->id);
                $usuario->nombre = $request->get('nombre');
                $usuario->apellidos = $request->get('apellidos');

                $usuario->telefono = $request->get('telefono');
                $usuario->dni = $request->get('dni');
                $usuario->rol = "cliente";

                $usuario->update();
                return redirect()->back()->with('success', 'Se actualizó su usuario con exito');
            }
        } catch (\Exception $e) {
       
            // $request->session()->flash('danger', 'Ocurrió un error al completar el formulario');

            return redirect()->back()->with('danger', 'Ocurrió un error al completar el formulario');
        }
    }
}
