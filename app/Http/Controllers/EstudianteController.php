<?php

namespace App\Http\Controllers;
use App\Materia;
use App\Profesor;
use App\Grado;
use App\Estudiante;
use Illuminate\Http\Request;
use App\Http\Controllers\UtilController;


class EstudianteController extends Controller
{
    
     public function index()
    {

        $estudiantes = Estudiante::query()
                  ->select(['grado_id', 'id','nombre', 'apellido', 'telefono', 'cedula'])
                  ->with(['grado:id,nombre']);
        
        $data = [];
        $data["title"] = __('messages.students.listTitle');
        $data["estudiantes"] = $estudiantes->paginate(7);
        $data["levels"] = Grado::all();
        return view('estudiantes.view') -> with("data", $data);
    }


    public function create()
    {
        $data = [];
        $data["title"] = __('messages.students.createTitle');
        $data["grados"] = Grado::all();
        return view('estudiantes.create') -> with("data", $data);
    }

    
    public function store(Request $request)
    {
         \App\Estudiante::create([
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'telefono' => $request->get('telefono'),
            'cedula' => $request->get('cedula'),
            'grado_id' => $request->get('grado'),
        ]);

         return back()->with('success', __('messages.students.sCreate'));
    }

  
    public function show($id)
    {

       
    }

    public function edit($id)
    {
        $data = [];
        $data["title"] = __('messages.students.updateTitle');
        $data["estudiante"] = Estudiante::findOrFail($id);
        return view('estudiantes.edit') -> with("data", $data);
    }

     public function update(Request $request, $id)
     {
         $estudianteUpdate = Estudiante::find($id);
         $estudianteUpdate->nombre = $request->nombre;
         $estudianteUpdate->apellido = $request->apellido;
         $estudianteUpdate->cedula = $request->cedula;
         $estudianteUpdate->telefono = $request->telefono;
         $estudianteUpdate->save();
         
         return redirect('/estudiantes')->with('success', __('messages.students.sUpdate'));
         
    }
   
   
    public function destroy($id)
    {
        \App\Estudiante::find($id)->delete();

        return back()->with('success', __('messages.students.sDelete'));
    }
}
