<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
//use App\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UserController extends Controller {

    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
    //Get all users and pass it to the view
        $users = User::all(); 
        $roles = Role::all();

        return view('users.index', ['users' => User::paginate(5), 'roles' => $roles])->with('users', $users);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
    //Get all roles and pass it to the view
        $roles = Role::get();
        return view('users.create', ['roles'=>$roles]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
    //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        $user = User::create($request->only('email', 'name', 'password')); //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
    //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();            
            $user->assignRole($role_r); //Assigning role to user
            }
        }        
    //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully added.');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        return redirect('users');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {// echo __METHOD__;
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles

        return view('users.edit', compact('user', 'roles')); //pass user and roles data to view

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        // $user = User::findOrFail($id); //Get role specified by id

    //Validate name, email and password fields    
        // $this->validate($request, [
        //     'name'=>'required|max:120',
        //     'email'=>'required|email|unique:users,email,'.$id,
        //     'password'=>'required|min:6|confirmed'
        // ]);
        // $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        // $roles = $request['roles']; //Retreive all roles
        // $user->fill($input)->save();

        // if (isset($roles)) {        
        //     $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
        // }        
        // else {
        //     $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        // }
        // return redirect()->route('users.index')
        //     ->with('flash_message',
        //      'User successfully edited.');
        // return response()->json($user);
        // return response($user);
        
        
        // return response()->json($user);


        $user = User::find ($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

    return response()->json($user);

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
    //Find a user with a given id and delete
        $user = User::findOrFail($id); 
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully deleted.');
    }


    // public function addUser(Request $request){

    //     $rules = array(
    //     'name' => 'required',
    //     'email' => 'required',
    //     );

    //     $validator = Validator::make(Input::all(), $rules);

    //     if ($validator->fails())
    //         return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

    //     else {

    //         //$user = new User;
    //         $user = User::create($request->only('email', 'name', 'password'));
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->save();
    //         return response()->json($user);
    //     }
    // }


    public function addUser(Request $request) {
    //Validate name, email and password fields
        // $this->validate($request, [
        //     'name'=>'required|max:120',
        //     'email'=>'required|email|unique:users',
        //     'password'=>'required|min:6|confirmed'
        // ]);
        // if( $request->isMethod('post') ) {

            $rules = [
                'name' => 'required|max:120',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ];

        //     $this->validate( $request,$rules );

        //     dump( $request->all() );
        // }

        $validator = Validator::make ( Input::all(), $rules);
        // if ($validator->fails())
        // return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
        if ($validator->fails()) { return Response::json(['isvalid'=>false,'errors'=>$validator->messages()]); }

        else {
            $user = User::create($request->only('name', 'email', 'password')); //Retrieving only the email and password data
            //$user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
        }

        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();            
            $user->assignRole($role_r); //Assigning role to user
            }
        }

        $user->save();
        return response()->json($user);

    //Redirect to the users.index view and display message
        // return redirect()->route('users.index')
        //     ->with('flash_message',
        //      'User successfully added.');
    }

    public function editUser(Request $request, $id){
        $user = User::find ($request->id);
        // $user = User::findOrFail($id); //Get user with specified id

        // Validate name, email and password fields    
        // $this->validate($request, [
        //     'name'=>'required|max:120',
        //     'email'=>'required|email|unique:users,email,'.$id,
        //     'password'=>'required|min:6|confirmed'
        // ]);
        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        // echo "$roles";
        // $user->fill($input)->save();

        // if (isset($roles)) {        
        //     $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
        // }        
        // else {
        //     $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        // }


        //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
                
                $role_r = Role::where('id', '=', $role)->firstOrFail();            
                $user->assignRole($role_r); //Assigning role to user

                if (isset($roles)) {        
                    $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
                }        
                else {
                    $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
                }

            }
        }

       
        // $user = User::find ($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

    return response()->json($user);
    }


    public function roles() {
        // return $this->hasMany('App\User');
    }   


}