@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="user-administration">
    <h1><i class="fa fa-users"></i> User Administration <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
    <hr>
    <div class="table-responsive">
        <table id="table" class="table table-bordered table-striped" data-toggle="dataTable" data-form="deleteForm">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <!-- <tr> -->
                <tr class="user_{{ $user->id }}">

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td class="with-buttons">
                    <!-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left edit-modal" data-toggle="modal" data-target="#userEditModal" style="margin-right: 3px;">Edit</a> -->

                    <!-- <a  href="{{ route('users.edit', $user->id) }}" class="edit-user-modal btn btn-primary btn-xs edit" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#editUser">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                    </a> -->

                    <button  class="edit-user-modal btn btn-primary btn-xs edit" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-roles="{{$user->roles}}" data-toggle="modal" data-target="#editUser"><span class="glyphicon glyphicon-pencil"></span> Edit</button>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                    {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                    <button onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')" class="btn btn-danger btn-xs" name="delete"><i class="glyphicon glyphicon-remove"></i>Delete</button>
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <!-- <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a> -->
    <a href="{{ URL::to('users/create') }}" class="btn btn-success " data-toggle="modal" data-target="#userModal">Add User</a>
    <!-- <button class="btn btn-warning" type="submit" id="add">
        <span class="glyphicon glyphicon-plus"></span> Add Users
    </button> -->
    <!-- <a href="#" class="add-user-modal btn btn-success btn-sm">
        <i class="glyphicon glyphicon-plus"></i>
    </a> -->
    <button class="add-user-modal btn btn-success btn-sm">
      <i class="glyphicon glyphicon-plus"></i> Add User
    </button>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Pagination</div>
        <div class="panel-body">
          <p>...</p>
        </div>
      </div>
    </div>
  </div>
</div>



{{-- Modal Form 'Add User' for button 'Add User' ------------------------------------------------------------ADD-----}}
<div id="createUser" class="modal fade" role="dialog">   
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title"></h1>
            </div>
            <div class="modal-body">
              <div class="alert alert-warning" hidden></div>
              <div class="alert alert-success" hidden=""></div>

                <form class="form-horizontal" role="form" data-toggle="validator">
                    {{ csrf_field() }}
                    <div class="form-group row add-row">
                        <label class="control-label col-sm-2" for="name">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" data-validate="true" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" data-error="Bruh, that email address is invalid" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <div id="roles_checkboxes" class="col-sm-10 col-sm-offset-2">
                          <?php $i=0; ?>
                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name), array('class'=>'roles_chbxs' . $i,'id'=>'')) }}<br>
                            <?php $i++; ?>
                        @endforeach
                        </div>        
                    </div>                    
                    <div class="form-group">
                      {{ Form::label('password', 'Password :', array('class' => 'control-label col-sm-2')) }}
                      <div class="col-sm-10">
                          {{ Form::password('password', array('id' => 'password', 'class' => 'form-control',  'data-minlength' => '6', 'placeholder' => "Password", 'required')) }}
                      </div>
                    </div>

                    <div class="form-group">
                      {{ Form::label('password', 'Confirm Password :', array('class' => 'control-label col-sm-2')) }}
                      <div class="col-sm-10">        
                          {{ Form::password('password_confirmation', array('class' => 'form-control', 'data-match' => '#password', 'data-match-error' => "Whoops, these don't match", 'placeholder' => "Confirm Password", 'required')) }}
                      </div>
                    </div>
                
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" id="add-modal" data-method="serialize">
                    <span class="glyphicon glyphicon-plus"></span> Save
                </button>
                <button class="btn btn-link" type="button" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Close
                </button>                
            </div>

        </div>
    </div>
</div>


{{-- Modal Form 'Edit User' and 'Delete User' for buttons 'Edit' and 'Delete' -----------------------EDIT-DELETE-----}}
<div id="editUser"class="modal fade" role="dialog">

    <div class="modal-dialog wmodal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title"></h1>
            </div>
            <div class="modal-body">
              <div class="alert alert-warning" hidden></div>
              <div class="alert alert-success" hidden=""></div>

                <form class="form-horizontal" role="modal" data-toggle="validator">
                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label class="control-label col-sm-2"for="fid">ID :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fid" name="fid" disabled>
                        </div>
                    </div>  

                    <div class="form-group row edit-row">
                        <label class="control-label col-sm-2" for="name">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Name" required="">
                        </div>
                      </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class='form-group'>
                        <div id="roles_checkboxes_edit" class="col-sm-10 col-sm-offset-2">
                          <?php $i=1; ?>
                        @foreach ($roles as $role)
                        {{ $user->id }} {{ $role->name }}
                        <?php //$ur = isset($user->roles, 'id'); /*echo $i;*/ echo ($ur); 
                          // if ($user->belongsTo($role)) echo "hello"; else echo "nohello";
                          
                          if ($user->roles()->where('id',$i)->first()) echo "hello+"; else echo "nohello-";
                          if ($role->name == 'Owner' ) echo "role+"; else echo "norole-";
                          if ( $i == $role->id ) echo "role+"; else echo "norole-";


                        ?>
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name), array('class'=>'roles_chbxs_edit' . $i,'id'=>'')) }}<br>
                            <?php $i++; ?>
                        @endforeach

                        </div>        
                    </div>    

                    <div class="form-group">
                      {{ Form::label('password', 'Password :', array('class' => 'control-label col-sm-2')) }}
                      <div class="col-sm-10">
                          {{ Form::password('password', array('id' => 'password_edit', 'class' => 'form-control',  'data-minlength' => '6', 'placeholder' => "Password", 'required')) }}
                      </div>
                    </div>

                    <div class="form-group">
                      {{ Form::label('password', 'Confirm Password :', array('class' => 'control-label col-sm-2')) }}
                      <div class="col-sm-10">        
                          {{ Form::password('password_confirmation', array('class' => 'form-control', 'data-match' => '#password', 'data-match-error' => "Whoops, these don't match", 'placeholder' => "Confirm Password", 'required')) }}
                      </div>
                    </div> 

                </form>
                        {{-- Form Delete User --}}
                <div class="deleteUser" hidden>
                  Are You sure want to delete <span class="title"></span>?
                  <span class="hidden id"></span>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" id="edit-modal" data-method="serialize">
                    <span class="glyphicon glyphicon-edit"></span> Update
                </button>
                <button class="btn btn-link" type="button" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Close
                </button>
          </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div> 

@endsection
