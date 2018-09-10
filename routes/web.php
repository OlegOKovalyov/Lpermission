<?php


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');


// Route::get('/create_role_permission', function() {

//  	$role = Role::create(['name' => 'Administer']);
//  	$permission = Permission::create(['name' => 'Administer roles & permissions']);
//  	auth()->user()->assignRole('Administer');
//  	auth()->user()->givePermissionTo('Administer roles & permissions');


//  });

Route::group(['middleware' => ['web']], function() {
  Route::resource('users','UserController');
  Route::POST('/users/addUser','UserController@addUser');
  Route::POST('editUser','UserController@editUsert');
  Route::POST('deleteUser','PostController@deleteUser');
});
