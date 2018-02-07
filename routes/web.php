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
    return redirect('administrator/users/');
});

Route::get('/check/user', 'AdministratorController@checkUser');

Route::get('/login', function () {
    return view('login');
});

Route::get('/votantes', 'AdministratorController@votantes');
Route::post('/votantes', 'AdministratorController@votantesValidate');

Route::group(['prefix'=>'superadmin','middleware'=>['auth','AccessSuperAdmin']],function(){
  Route::get('/', 'SuperAdminController@dashboard');
});
Route::group(['prefix'=>'administrator','middleware'=>['auth','AccessAdmin']],function(){
  Route::get('/', 'AdministratorController@dashboard');

  Route::get('/callcenter', 'AdministratorController@callCenter');
  Route::post('/callcenter', 'AdministratorController@saveUserCallcenter');
  Route::get('/callcenter/assignUsers', 'AdministratorController@saveAssignUser');
  Route::post('/callcenter/assignUsers', 'AdministratorController@saveAssignUser');

  Route::group(['prefix'=>'users'],function(){
          Route::get('/', 'AdministratorController@getUsers');
          Route::get('/{id}', 'AdministratorController@getUsersByProfile');
          Route::post('/add', 'AdministratorController@saveUsers');
          Route::post('/headquarter/add', 'AdministratorController@saveHeadquarter');
          Route::post('/edit', 'AdministratorController@updateUsers');
          Route::post('/edit12', 'AdministratorController@updateUsers12');
          Route::post('/delete', 'AdministratorController@deleteUser');
          Route::post('/delete12', 'AdministratorController@deleteUser12');
          Route::post('/add/{id}', 'AdministratorController@saveUserProfile');
          Route::get('/get/{id}', 'AdministratorController@getUser');
      });

});
Route::group(['prefix'=>'user','middleware'=>['auth','AccessUser']],function(){
  Route::get('/', 'UserController@dashboard');
});

Route::group(['prefix'=>'callCenter','middleware'=>['auth','AccessCallCenter']],function(){
  Route::get('/', 'CallCenterController@dashboard');
  Route::get('/call', 'CallCenterController@saveCall');
  Route::post('/call', 'CallCenterController@saveCall');
  Route::get('/get/{id}', 'CallCenterController@getUsers');
  Route::get('/details/{id}', 'CallCenterController@detailsCall');
  Route::get('/edit/{id}', 'CallCenterController@editCall');
  Route::post('/edit/{id}', 'CallCenterController@updateCall');
});

Route::get('/formulario/{id}', 'AdministratorController@getFormRegister');
Route::post('/formulario/{id}', 'AdministratorController@saveFormRegister');

//Add Contacts
Route::get('/formulario/contacts/{id}', 'AdministratorController@getFormRegisterContacts');
Route::post('/formulario/contacts/{id}', 'AdministratorController@saveFormRegisterContacts');




//Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@Login']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@authenticate']);

Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('/redirect', ['as' => 'auth.redirect', 'uses' => 'Auth\LoginController@redirect']);
