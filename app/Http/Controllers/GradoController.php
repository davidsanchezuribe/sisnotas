<?php

namespace App\Http\Controllers;
use App\Materia;
use App\Profesor;
use App\Grado;
use App\Estudiante;
use Illuminate\Http\Request;
use App\Http\Controllers\UtilController;

class GradoController extends Controller
{
    public function lista()
    {
        $data = [];
        $data["title"] = __('messages.level.manageTitle');
        $data["levels"] = Grado::all();
        return view('grado.lista') -> with("data", $data);
    }

    public function crear()
    {
        $data = [];
        $data["title"] = __('messages.level.crearTitle');
        return view('grado.crear') -> with("data", $data);
    }
    public function save(Request $request)
    {
        $request->validate([
            "nombre" => "required",
        ]);
        Grado::create($request->only(["nombre"]));

        return back()->with('success','Se creo el grado correctamente!');
    }

    public function update($id){
        $data = [];
        $grado = Grado::findOrFail($id);
        $data["level"]=  $grado;

        $data["title"] = __('messages.level.updateTitle');
        return view('grado.update') -> with("data", $data);
    }

    public function saveUpdate(Request $request,$id){
        $data = [];
        $request->validate([
            "nombre" => "required",
        ]);
        error_log($request->nombre);
        error_log('Some message here.');

        $gradoUpdate = Grado::find($request->id);
       
        $gradoUpdate->nombre=$request->nombre;
        $gradoUpdate->save();
        return back()->with('success','Se actualizo el grado correctamente!');
    }

    

    public function delete($id){
        $res=Grado::where('id',$id)->delete();
        return back()->with('success','Se elimino el grado correctamente!');
    }

}