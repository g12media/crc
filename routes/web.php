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


Route::group(['prefix'=>'superadmin','middleware'=>['auth','AccessSuperAdmin']],function(){
  Route::get('/', 'SuperAdminController@dashboard');
});
Route::group(['prefix'=>'administrator','middleware'=>['auth','AccessAdmin']],function(){
  Route::get('/', 'AdministratorController@dashboard');

  Route::group(['prefix'=>'users'],function(){
          Route::get('/', 'AdministratorController@getUsers');
          Route::get('/{id}', 'AdministratorController@getUsersByProfile');
          Route::post('/add', 'AdministratorController@saveUsers');
          Route::post('/delete', 'AdministratorController@deleteUser');
          Route::post('/add/{id}', 'AdministratorController@saveUserProfile');
      });

});
Route::group(['prefix'=>'user','middleware'=>['auth','AccessUser']],function(){
  Route::get('/', 'UserController@dashboard');
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
