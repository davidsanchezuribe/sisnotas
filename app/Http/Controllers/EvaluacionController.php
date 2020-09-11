<?php

namespace App\Http\Controllers;
use App\Materia;
use App\Evaluacion;
use Illuminate\Support\Facades\Validator;

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
                    "fecha" => "required",
                    "porcentaje" => "required|numeric|min:1|max:$maxPercent",
                ]);
                $result = Evaluacion::create($request->only([
                    "desc",
                    "fecha",
                    "porcentaje",
                    "materia_id",
                ]));
                $examId = $result->createGrades();
                return back()->with('success',__('messages.exams.sCreate'));
                break;
            case 'modify':
                $id = $request->input("materia_id");
                return redirect()->route("evaluacion.update", ['id' => $id]);
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
        $materia_id = $request->input('materia_id');
        switch ($request->input('action')) {
            case 'back':
                return redirect()->route("materia.list");
                break;
            case 'add':  
                return redirect()->route("evaluacion.create", ['id' => $materia_id]);
                break;
            case 'update':
                $evaluaciones = Materia::find($materia_id)->hasMany('App\Evaluacion')->getResults();
                $totalEvaluado = 0;
                $data = [];
                foreach($evaluaciones as $evaluacion){
                    $idEvaluacion = $evaluacion->getId();
                    $desc = $request->input(["desc" . $idEvaluacion]);
                    if(empty($desc)){
                        return back()->withErrors(__('messages.exams.vEmptyDesc') . $idEvaluacion . __('messages.exams.vNotEmpty'));
                    }
                    $fecha = $request->input(["fecha" . $idEvaluacion]);
                    $porcentaje = $request->input(["porcentaje" . $idEvaluacion]);
                    if(empty($porcentaje)){
                        return back()->withErrors(__('messages.exams.vEmptyDate') . $idEvaluacion . __('messages.exams.vNotEmpty'));
                    }
                    $newEvaluacion = ["desc" => $desc, "fecha" => $fecha, "porcentaje" => $porcentaje];
                    $customRequest = new Request($newEvaluacion);
                    $customRequest->validate([
                        "desc" => "required|max:64",
                        "fecha" => "required",
                        "porcentaje" => "required|numeric|min:1",
                    ]);
                    $data[$idEvaluacion] = $newEvaluacion;
                    $totalEvaluado += $porcentaje;
                }
                if($totalEvaluado > 100){
                    return back()->withErrors(__('messages.exams.vMax100'));
                }
                foreach($data as $id => $evaluacion){
                    Evaluacion::find($id)->update($evaluacion);
                }
                return back()->with('success',__('messages.exams.sUpdate'));
                break;
            default:
                $id = substr($request->input('action'), 1);
                Evaluacion::destroy($id);
                return back()->with('success',__('messages.exams.sDelete'));
                break;
        }
        return null;
    }
}
