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

Route::get('/evaluacion/crea/{id}', 'EvaluacionController@create')->name("evaluacion.create");

Route::post('/evaluacion/guarda', 'EvaluacionController@save')->name("evaluacion.save");

Route::get('/evaluacion/actualiza/{id}', 'EvaluacionController@update')->name("evaluacion.update");

Route::post('/evaluacion/actualizaoborra', 'EvaluacionController@updateordelete')->name("evaluacion.updateordelete");

Route::get('/nota/gestiona', 'NotaController@admin')->name("nota.admin");

Route::get('/nota/insertualiza', 'NotaController@upsert')->name("nota.upsert");