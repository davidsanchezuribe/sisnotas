<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/materia/crea', 'MateriaController@create')->name("materia.create");

Route::get('/materia/lista', 'MateriaController@list')->name("materia.list");

Route::get('/materia/muestra/{id}', 'MateriaController@show')->name("materia.show");

Route::post('/materia/guarda', 'MateriaController@save')->name("materia.save");

Route::post('/materia/actualizaoborra', 'MateriaController@updateordelete')->name("materia.updateordelete");

Route::post('/materia/actualiza', 'MateriaController@update')->name("materia.update");

Route::get('/evaluacion/gestiona', 'EvaluacionController@admin')->name("evaluacion.admin");

Route::post('/evaluacion/insertualiza', 'EvaluacionController@upsert')->name("evaluacion.upsert");

Route::get('/nota/gestiona', 'NotaController@admin')->name("nota.admin");

Route::post('/nota/insertualiza', 'NotaController@upsert')->name("nota.upsert");