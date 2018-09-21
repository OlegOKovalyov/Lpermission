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
{{ csrf_field() }}
            <tbody>
                @foreach ($users as $user)
                <!-- <tr> -->
                <tr class="user_{{ $user->id }}">

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td class="with-buttons">
                    <!-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left edit-modal" data-toggle="modal" data-target="#userEditModal" style="margin-right: 3px;">Edit</a> -->
                    <a  href="{{ route('users.edit', $user->id) }}" class="edit-modal btn btn-primary btn-xs edit" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-toggle="modal" data-target="#userEditModal">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                    </a>

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
<<<<<<< HEAD
    <a href="{{ URL::to('users/create') }}" class="btn btn-success " data-toggle="modal" data-target="#userModal">Add User</a>
    <!-- <button class="btn btn-warning" type="submit" id="add">
        <span class="glyphicon glyphicon-plus"></span> Add Users
    </button> -->
    <a href="#" class="create-modal btn btn-success btn-sm">
        <i class="glyphicon glyphicon-plus"></i>
    </a>

{{-- Form Create User Modal --}} 
<div id="create" class="modal fade" role="dialog">   
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
<div id="form_result"></div>
                    <div class="form-group row add">
                        <label class="control-label col-sm-2" for="name">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class='form-group'>
                        <div id="roles_checkboxes" class="col-sm-10 col-sm-offset-2">
                          <?php $i=0; ?>
                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name), array('id'=>'roles_chbxs' . $i,'class'=>'')) }}<br>
                            <?php $i++; ?>
                        @endforeach
                        </div>        
                    </div>                    
=======
    <a href="{{ route('users.create')}}" class="btn btn-success" data-toggle="modal" data-target="#userModal">Add User</a>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
      </div>
    </div> 
>>>>>>> a76270f864d7a4217f1b23ad9e1b51d6c8d6be29

                    <div class="form-group">
                      {{ Form::label('password', 'Password :', array('class' => 'control-label col-sm-2')) }}
                      <div class="col-sm-10">
                          {{ Form::password('password', array('class' => 'form-control')) }}
                      </div>
                    </div>

                    <div class="form-group">
                      {{ Form::label('password', 'Confirm Password :', array('class' => 'control-label col-sm-2')) }}
                      <div class="col-sm-10">        
                          {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                      </div>
                    </div>
                
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning" type="submit" id="add-modal" data-method="serialize">
                    <span class="glyphicon glyphicon-plus"></span>Save User
                </button>
                <button class="btn btn-warning" type="button" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>Close
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