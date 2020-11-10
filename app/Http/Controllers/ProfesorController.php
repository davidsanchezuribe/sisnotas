<?php

namespace App\Http\Controllers;
use App\Materia;
use App\Profesor;
use App\Grado;
use App\Estudiante;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{

    public function index()
    {
        $profesores = Profesor::query()
                     ->select(['id','nombre', 'apellido', 'cedula']);
        
        $data = [];
        $data["title"] = __('messages.teachers.listTitle');
        $data["profesores"] = $profesores->paginate(7);
        
        return view('profesores.view') -> with("data", $data);
    }
   
    public function create()
    {
        $data = [];
        $data["title"] = __('messages.teachers.createTitle');

        return view('profesores.create') -> with("data", $data);
    }

    public function store(Request $request)
    {
         $request->validate([
            "nombre" => "required",
            "apellido" => "required",
            "cedula" => "required",
         ]);
        
        \App\Profesor::create([
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'cedula' => $request->get('cedula'),
        ]);

        return back()->with('success', __('messages.teachers.sCreate'));
    }


    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $data = [];
        $data["title"] = __('messages.teachers.updateTitle');
        $data["profesor"] = Profesor::findOrFail($id);
        return view('profesores.edit') -> with("data", $data);
    }

   
    public function update(Request $request, $id)
    {
        $profesorUpdate = Profesor::find($id);
        $profesorUpdate->nombre = $request->nombre;
        $profesorUpdate->apellido = $request->apellido;
        $profesorUpdate->cedula = $request->cedula;
        $profesorUpdate->save();
         
        return redirect('/profesores')->with('success', __('messages.teachers.sUpdate'));
    }

  
    public function destroy($id)
    {
        \App\Profesor::find($id)->delete();

        return back()->with('success', __('messages.teachers.sDelete'));
    }
}
