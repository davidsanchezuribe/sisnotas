<?php

namespace App\Http\Controllers;
use App\Materia;
use App\Profesor;
use App\Grado;
use Illuminate\Http\Request;
use App\Http\Controllers\UtilController;

class MateriaController extends Controller
{
    public function create()
    {
        $data = [];
        $data["title"] = __('messages.courses.createTitle');
        $data["teachers"] = Profesor::all();
        $data["grados"] = Grado::all();
        return view('materia.crea') -> with("data", $data);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);
        $nombre = $request->input("name");
        $grado_id = $request->input("grado");
        $profesor_id = $request->input("teacher") == 0 ? null : $request->input("teacher");

        Materia::create(['nombre' => $nombre, 'profesor_id' => $profesor_id, 'grado_id' => $grado_id]);
        return back()->with('success', __('messages.courses.sCreate'));
    }

    public function list()
    {
        $data = [];
        $data["title"] = __('messages.courses.listTitle');
        $data["materias"] = Materia::query()
            ->select(['id', 'nombre', 'grado_id', 'profesor_id'])
            ->with(['profesor:id,nombre','grado:id,nombre'])
            ->paginate();
        return view('materia.lista') -> with("data", $data);
    }

    public function show($id)
    {
        $data = [];

        $data["id"] = $id;
        
        $materia = Materia::find($id);
        if ($materia == null) {
            $notFoundTitle = __('messages.util.modelNotFound.courseT');
            $notFoundObject = __('messages.util.modelNotFound.course'); 
            return UtilController::modelNotFound($id, $notFoundTitle, $notFoundObject);
        }
        $data["title"] = __('messages.courses.showTitle');
        $data["teachers"] = Profesor::all();
        $data["grados"] = Grado::all();
        $data["nombre"] = $materia->getNombre();
        $data["profesor_id"] = $materia->getProfesor_id();
        $data["grado_id"] = $materia->getGrado_id();
        //dd($data["profesor_id"]);
        return view('materia.muestra')->with("data", $data);
    }
    
    public function updateordelete(Request $request)
    {
        $id = $request->input("id");
        switch ($request->input('action')) {
            case 'delete':
                Materia::destroy($id);
                return redirect()->route("materia.list")->with('success', __('messages.courses.sDelete'));
                break;
            case 'schedule':
                return redirect()->route("evaluacion.create", ["id" => $id]);
                break;
            case 'report':
                return redirect()->route("nota.manage", ["id" => $id]);
                break;    
            case 'update':
                $request->validate([
                    "name" => "required",
                ]);
                $nombre = $request->input("name");
                $profesor_id = $request->input("teacher") == 0 ? null : $request->input("teacher");
                Materia::where('id', $id)->update(['nombre' => $nombre, 'profesor_id' => $profesor_id]);
                return redirect()->back()->with('success', __('messages.courses.sUpdate'));
                break;
        }
    }
}