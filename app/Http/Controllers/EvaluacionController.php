<?php

namespace App\Http\Controllers;
use App\Materia;
use App\Evaluacion;

use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    public function create($id)
    {
        $data = [];
        $data["id"] = $id;
        $materia = Materia::find($id);
        if ($materia == null) {
            $notFoundTitle = __('messages.util.modelNotFound.courseT');
            $notFoundObject = __('messages.util.modelNotFound.course'); 
            return UtilController::modelNotFound($id, $notFoundTitle, $notFoundObject);
        }
        $data["title"] = __('messages.exams.createTitle');
        $data["nombre"] = $materia->getNombre();
        $data["profesor"] = $materia->profesor()->first()->getNombre();
        $data["grado"] = $materia->grado()->first()->getNombre();
        $data["evaluaciones"] = $materia->evaluaciones()->getResults();
        //calcular si faltan evaluaciones o si estan completas
        $data["totalEvaluado"] = $materia -> evaluated();
        return view('evaluacion.crea')->with("data", $data);
    }

    public function save(Request $request)
    {      
        switch ($request->input('action')) {
            case 'back':
                return redirect()->route("materia.list");
                break;
            case 'add':
                $materia_id = $request->input("materia_id");
                $evaluated = Materia::find($materia_id)->evaluated();
                $maxPercent = 100 - $evaluated;
                $request->validate([
                    "desc" => "required|max:64",
                    "fecha" => "required|after_or_equal:today",
                    "porcentaje" => "required|numeric|min:1|max:$maxPercent",
                ]);
                Evaluacion::create($request->only([
                    "desc",
                    "fecha",
                    "porcentaje",
                    "materia_id",
                ]));
                return back()->with('success',__('messages.exams.sCreate'));
                break;
        }
    }

    public function update($id)
    {
        $data = [];
        $data["id"] = $id;
        $materia = Materia::find($id);
        if ($materia == null) {
            $notFoundTitle = __('messages.util.modelNotFound.courseT');
            $notFoundObject = __('messages.util.modelNotFound.course'); 
            return UtilController::modelNotFound($id, $notFoundTitle, $notFoundObject);
        }
    
        $data["title"] = __('messages.exams.updateTitle');
        $data["nombre"] = $materia->getNombre();
        $data["profesor"] = $materia->profesor()->first()->getNombre();
        $data["grado"] = $materia->grado()->first()->getNombre();
        $data["evaluaciones"] = $materia->evaluaciones()->getResults();
        return view('evaluacion.actualiza')->with("data", $data);
    }
    public function updateordelete(Request $request)
    {
        switch ($request->input('action')) {
            case 'back':
                return redirect()->route("materia.list");
                break;
            case 'update':
                return back()->with('success','Item created successfully!');
                break;
            default:
                dd('delete');
                break;
        }

        return '<p>update or delete<p>';

    }
}

/*
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
*/
