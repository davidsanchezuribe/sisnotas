<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $estudiante_id
 * @property integer $evaluacion_id
 * @property string $created_at
 * @property string $updated_at
 * @property float $valor
 * @property Estudiante $estudiante
 * @property Evaluacione $evaluacione
 */
class Nota extends Model
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
    protected $fillable = ['estudiante_id', 'evaluacion_id', 'created_at', 'updated_at', 'valor'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evaluacione()
    {
        return $this->belongsTo('App\Evaluacione', 'evaluacion_id');
    }

    public function getValue(){
        return $this -> valor;
    }
}
