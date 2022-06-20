<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class NoticiaController extends Controller
{
    public function __construct()//Mostrara al usuario con la sesion de cliente las noticias de nuestra web , si es administrador solo mostrara el dashboard
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {

                return view('noticias');
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('noticias');
        }
    }


    function mostrar()//Mostrara al usuario con la sesion de cliente las noticias actuales de nuestra web siendo 
    //solo 7 en total a medida que se va añadiendo se ira sobreponiendo una a una en referencia a la mas actual , si es administrador solo mostrara el dashboard
    {

        if (Auth::check()) {
            if (auth()->user()->rol === "cliente") {

                $noticias = Noticia::orderBy('fecha', 'desc')->take(6)->get();
                $noticiasfinal = Noticia::orderBy('fecha', 'desc')->first();
                return view('noticias', compact('noticias', 'noticiasfinal'));
            } else {
                return redirect()->route('dashboard');
            }
        } else {


            return view('noticias');
        }
    }

    function index(Request $request)//Mostrara la ventana del listado de noticias en el panel administrador  con la busqueda de estas por nombre
    {
        if ($request) {
            if (Auth::check()) {
                if (auth()->user()->rol === "admin") {

                    $buscar = $request->get('buscar');
                    $noticias = Noticia::where('titulo', 'LIKE', '%' . $buscar . '%')->paginate(20);

                    return view('admin.noticia.index', compact('buscar', 'noticias'));
                } else {
                    return redirect()->route('menu');
                }
            } else {


                return view('menu');
            }
        }
    }

    function create()//Mostrara la ventana de creacion de una noticia en el panel administrador 
    {

        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                $noticias = Noticia::get();

                return view('admin.noticia.create', compact('noticias'));
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
    }

    function store(Request $request)//Funcion para crear la noticia nueva junto con sus campos requeridos en el panel de administrador
    {
        $validator = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'categoria' => 'required',
            'fecha' => 'required',
            'contenido' => 'required|max:10000',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ]);

        try {

            $noticia = new Noticia();
            $noticia->titulo = $request->get('titulo');
            $noticia->autor = $request->get('autor');
            $noticia->categoria = $request->get('categoria');
            $noticia->fecha = $request->get('fecha');
            $noticia->contenido = $request->get('contenido');
            $imageName = time() . '.' . $request->imagen->extension();

            $request->imagen->move(public_path('img/noticias'), $imageName);
            $noticia->imagen = $imageName;

            $noticia->save();
            return Redirect::to('admin/noticia')->with('success', 'Se registró la noticia');
        } catch (\Exception $e) {
            dd($e);
            // $request->session()('danger', 'Hubo un error al completar el formulario');
            return redirect()->back()->with('danger', 'Hubo un error al completar el formulario');
        }
    }
    public function edit($id)//Mostrara la ventana de editar la noticia seleccionada en el listado del panel administrador
    {
        if (Auth::check()) {
            if (auth()->user()->rol === "admin") {

                $noticia = Noticia::where('id', $id)->firstOrFail();


                return view('admin.noticia.edit', compact('noticia'));
            } else {
                return redirect()->route('menu');
            }
        } else {


            return view('menu');
        }
    
    }

    public function update(Request $request, $id) //Actualizara la noticia seleccionada en el listado del panel administrador
    // con los campos requeridos en la ventana de editar la noticia
    {

        $validator = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'categoria' => 'required',
            'fecha' => 'required',
            'contenido' => 'required|max:10000',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',

        ]);

        try {

            $imgname = uniqid();
            if ($request->hasFile('imagen')) {

                $imagen = $request->imagen->extension();



                $noticia = Noticia::where('id', $id)->firstOrFail();
                $noticia->titulo = $request->get('titulo');
                $noticia->autor = $request->get('autor');
                $noticia->categoria = $request->get('categoria');
                $noticia->fecha = $request->get('fecha');
                $noticia->contenido = $request->get('contenido');

                try {
                    unlink(public_path('img/noticias/' . $noticia->imagen));
                } catch (\Exception $e) {
                }

                $imagenName = $imgname . '.' . $request->imagen->extension();
                $request->imagen->move(public_path('img/noticias/'), $imagenName);
                $noticia->imagen = $imagenName;
                $noticia->update();


                $request->session()->flash('success', 'Se actualizó su noticia con exito');
                return Redirect::to('admin/noticia');
            } else {

                $noticia = Noticia::where('id', $id)->firstOrFail();
                $noticia->titulo = $request->get('titulo');
                $noticia->autor = $request->get('autor');
                $noticia->categoria = $request->get('categoria');
                $noticia->fecha = $request->get('fecha');
                $noticia->contenido = $request->get('contenido');
                $imageName = time() . '.' . $request->imagen->extension();

                $noticia->update();

                return Redirect::to('admin/noticia')->with('success', 'Se actualizó su noticia con exito');
            }
        } catch (\Exception $e) {

            return redirect()->back()->with('danger', 'Hubo un error al completar el formulario');
        }
    }


    public function destroy_noticia(Request $request, $id) //Elimina la noticia seleccionada en el listado del panel administrador
    {

        $noticia = Noticia::findOrFail($id);
        try {
            unlink(public_path('img/noticias' . $noticia->imagen));
        } catch (\Exception $e) {
        }
        $noticia->delete();
        $request->session()->flash('success', 'Se eliminó la noticia correctamente');
        return redirect()->back();
    }
}
