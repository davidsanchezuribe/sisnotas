<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $nombre
 * @property string $apellido
 * @property integer $cedula
 * @property Materia[] $materias
 */
class Profesor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'profesores';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'nombre', 'apellido', 'cedula'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materias()
    {
        return $this->hasMany('App\Materia', 'profesor_id');
    }
}
