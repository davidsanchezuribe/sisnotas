<?php

namespace App\Http\Controllers;

use App\Materia;
use App\Nota;
use App\Estudiante;
use App\Evaluacion;
use Validator;

use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function manage($id)
    {
        $data = [];
        $data["id"] = $id;
        $materia = Materia::find($id);
        if ($materia == null) {
            $notFoundTitle = __('messages.util.modelNotFound.courseT');
            $notFoundObject = __('messages.util.modelNotFound.course'); 
            return UtilController::modelNotFound($id, $notFoundTitle, $notFoundObject);
        }
        $data["title"] = __('messages.grades.manageTitle');
        $data["nombre"] = $materia->getNombre();
        $data["profesor"] = $materia->profesor()->first()->getNombre();
        $data["grado"] = $materia->grado()->first()->getNombre();
        $idEstudiantes = $materia->getGrado()->estudiantes()->pluck('id')->toArray();
        $data["idEstudiantes"] = $idEstudiantes;
        $nombreEstudiantes = $materia->getGrado()->estudiantes()->pluck('nombre')->toArray();
        $data["nombreEstudiantes"] = $nombreEstudiantes;
        $idEvaluaciones = $materia->evaluaciones()->pluck('id')->toArray();
        $data["idEvaluaciones"] = $idEvaluaciones;
        $descEvaluaciones = $materia->evaluaciones()->pluck('desc')->toArray();        
        $data["descEvaluaciones"] = $descEvaluaciones;
        $notas = [];
        foreach($idEstudiantes as $idEstudiante){
            foreach($idEvaluaciones as $idEvaluacion){
                $valor = Nota::where('estudiante_id', '=', $idEstudiante)
                ->where('evaluacion_id', '=', $idEvaluacion)->first()->getValue();
                $notas[$idEstudiante][$idEvaluacion] = $valor;
            }
        }
        $data["notas"] = $notas;
        return view('nota.gestiona')->with("data", $data);
    }

    public function update(Request $request)
    {
        //dd($request->input());
        //return back()->with('success',__('messages.exams.sDelete'));
        
        $materia_id = $request->input('materia_id');
        switch ($request->input('action')) {
            case 'back':
                return redirect()->route("materia.list");
                break;
            case 'update':
                foreach($request->input() as $key => $value){
                    if(substr( $key, 0, 1 ) === "s"){
                        $values = preg_split("/[se]+/", $key);
                        $estudiante_id = $values[1];
                        $evaluacion_id = $values[2];
                        $grade = $value;
                        $nombreEstudiante = Estudiante::findorfail($estudiante_id)->getNombre();
                        $descEvaluacion = Evaluacion::findorfail($evaluacion_id)->getDesc();
                        $msgPrefix = $descEvaluacion . ' ' . __('messages.grades.of') . ' ' . $nombreEstudiante . ' ';
                        $messages = [
                            'numeric' => $msgPrefix . __('messages.grades.numeric'),
                            'min' => $msgPrefix . __('messages.grades.min'),
                            'max' => $msgPrefix . __('messages.grades.max'),
                        ];
                        $rules = [
                            'numeric|min:0|max:5|nullable',
                        ];
                        $validator = Validator::make([$grade], $rules, $messages);
                        if ($validator->fails()) {
                            return back()->withErrors($validator->errors());
                        }
                        Nota::where('estudiante_id', '=', $estudiante_id)
                        ->where('evaluacion_id', '=', $evaluacion_id)
                        ->update(['valor' => $grade]);
                    }
                }
                return back()->with('success',__('messages.exams.sUpdate'));
                break;
        }
        return null;
        
    }
}
