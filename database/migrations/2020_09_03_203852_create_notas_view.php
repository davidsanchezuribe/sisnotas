<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateNotasView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW notasview AS
                        SELECT evaluaciones.id AS evaluacion_id, 
                        materias.id AS materia_id,
                        estudiantes.id AS estudiante_id
                        FROM evaluaciones
                        INNER JOIN materias 
                        ON evaluaciones.materia_id = materias.id
                        INNER JOIN estudiantes 
                        ON materias.grado_id = estudiantes.grado_id
                        WHERE evaluaciones.fecha < CURRENT_DATE;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW notasView");
    }
}
