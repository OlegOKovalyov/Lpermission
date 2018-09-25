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

Route::resource('categories', 'CategoryController');
  

Route::group(['middleware' => ['web']], function() {
  Route::resource('users','UserController');
  Route::post('/users/addUser', 'UserController@addUser');
  // Route::post('/users/addUser', 'UserController@addUser', ['addUser'=>'users.create']);
  Route::post('/users/{id}/editUser', 'UserController@editUser');
  // ///////////////////Route::put('/users/editUser', 'UserController@editUser', ['editUser'=>'users.update']);
  Route::put('/users/{user}/edit', 'UserController@update', ['update'=>'users.update']);


// Route::put('/editUser/{id?}',function(Request $request,$id){
//     $user = App\User::find($id);
//     $user->name = $request->name;
//     $user->email = $request->email;
//     $user->password = $request->password;
//     $user->save();
//     return response()->json($user);
// });


  // Route::put('/users/{id}', 'UserController@update', ['editUser'=>'users.update']);
  // Route::put('/users/{id}/editUser', 'UserController@editUser', ['editUser'=>'users.update']);
  //////////////////////Route::post('/users/editUser', 'UserController@editUser');
  // Route::post('/users/editUser/{id}', 'UserController@editUser', ['editUser'=>'users.update']);
  // Route::match(['get', 'put'], 'update/{id}', 'UserController@update');
  // Route::put('/editUser/{id}', 'UserController@editUser');
  // Route::post ( '/update', 'UserController@update' );
  // Route::post ( '/add', 'UserController@store' );
  // Route::post ( '/delete', 'UserController@destroy' );
});

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');


// Route::get('/create_role_permission', function() {

//  	$role = Role::create(['name' => 'Administer']);
//  	$permission = Permission::create(['name' => 'Administer roles & permissions']);
//  	auth()->user()->assignRole('Administer');
//  	auth()->user()->givePermissionTo('Administer roles & permissions');


//  });
