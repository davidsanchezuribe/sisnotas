<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $materia_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $desc
 * @property string $fecha
 * @property integer $porcentaje
 * @property Materia $materia
 * @property Nota[] $notas
 */
class Evaluacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'evaluaciones';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['materia_id', 'created_at', 'updated_at', 'desc', 'fecha', 'porcentaje'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notas()
    {
        return $this->hasMany('App\Nota', 'evaluacion_id');
    }

    public function getId(){
        return $this -> id;
    }

    public function getMateria(){
        return $this -> materia;
    }

    public function getFecha(){
        return $this -> fecha;
    } 

    public function getDesc(){
        return $this -> desc;
    }

    public function getPorcentaje(){
        return $this -> porcentaje;
    }   

}
