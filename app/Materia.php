<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $profesor_id
 * @property integer $grado_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $nombre
 * @property Grado $grado
 * @property Profesore $profesore
 * @property Evaluacione[] $evaluaciones
 */
class Materia extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['profesor_id', 'grado_id', 'created_at', 'updated_at', 'nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grado()
    {
        return $this->belongsTo('App\Grado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profesor()
    {
        return $this->belongsTo('App\Profesor', 'profesor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluaciones()
    {
        return $this->hasMany('App\Evaluacion');
    }

    public function getGrado()
    {
        return $this -> grado;
    }

    public function getNombre()
    {
        return $this -> nombre;
    }

    public function getProfesor_id()
    {
        return $this -> profesor_id;
    }  
     
    public function getGrado_id()
    {
        return $this -> grado_id;
    }

    public function getId(){
        return $this->id;
    }
    
    public function evaluated(){
        $exams = $this->hasMany('App\Evaluacion')->getResults();
        $total = 0;
        foreach($exams as $exam){
            $total += $exam -> getPorcentaje();
        }
        return $total;    
    }
}
