<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $grado_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $nombre
 * @property string $apellido
 * @property integer $telefono
 * @property integer $cedula
 * @property Grado $grado
 * @property Nota[] $notas
 */
class Estudiante extends Model
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
    protected $fillable = ['grado_id', 'created_at', 'updated_at', 'nombre', 'apellido', 'telefono', 'cedula'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grado()
    {
        return $this->belongsTo('App\Grado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notas()
    {
        return $this->hasMany('App\Nota');
    }
}
