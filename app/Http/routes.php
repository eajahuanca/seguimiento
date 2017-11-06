<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/home', 'HomeController@index');

/*RUTAS DEL ADMINISTRADOR*/
Route::post('save/user', 'AdministracionController@saveUser');
Route::get('roles', ['middleware' => 'createUser','uses'=>'AdministracionController@roles']);
//ruta de creacion de rol nuevo
Route::any('save/rol', 'AdministracionController@saveRol');

//Ruta de permisos asignados al rol
Route::get('permisos/{id}', 'AdministracionController@permisos');

//Altas bajas permisos
Route::post('quitarPermiso', 'AdministracionController@desasignar');
Route::post('asignarPermiso', 'AdministracionController@asignar');

//Asignar Rol
Route::get('asignarRol/{idUser}', 'AdministracionController@asignarRol');
Route::post('regsiter/asignarRol', 'AdministracionController@registerAsignarRol');

//Administrar perfil
Route::get('perfil', 'AdministracionController@perfil');
Route::any('updatePerfil', 'AdministracionController@updatePerfil');
Route::any('updatePassword', 'AdministracionController@updatePassword');
Route::any('updateFoto', 'AdministracionController@updateFoto');

Route::group(['middleware' => 'auth'], function(){
    //Rutas RESTFULL
    Route::resource('/dashboard', 'DashboardController');
    Route::group(['middleware' => 'admin'], function(){
        Route::resource('/entidad', 'EntidadController');
        Route::resource('/provincia','ProvinciaController');
        Route::resource('/municipio','MunicipioController');
        Route::resource('/reglamento','ReglamentoController');
        Route::resource('/componente','ComponenteController');
        Route::resource('/area','AreaController');
        Route::resource('/cargo','CargoController');
    });
    
    //Route::resource('/sigec','SigecController');
    Route::resource('/solicitud','SolicitudController');
    Route::resource('/listar','SoliCiteListController');
    Route::resource('/evaluacion','EvaluacionController');
    Route::resource('/convenio','ConvenioController');
    Route::resource('/seguimiento','SeguimientoController');

    //Rutas AJAX
    Route::get('getMunicipio/{provinciaID}','MunicipioController@getMunicipios');
    Route::get('getProvincia/{departamentoID}','ProvinciaController@getProvincias');
    Route::get('getSigla/{entidadID}','EntidadController@getSiglas');
    Route::get('getAutoriza/{solicitudID}','SolicitudController@getUpdateEstado');
    Route::post('/postEstado', 'SolicitudController@postUpdateEstado');
});