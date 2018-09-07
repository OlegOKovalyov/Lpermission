@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="user-administration">
    <h1><i class="fa fa-users"></i> User Administration <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" data-toggle="dataTable" data-form="deleteForm">

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
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                    <a href="{{ route('users.edit', $user->id) }}" data-id="{{ $user->id}}" class="btn btn-info pull-left" data-toggle="modal" data-target="#userEditModal" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id],  'class' =>'form-inline form-delete' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger delete', 'name' => 'delete_modal']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <!-- <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a> -->
    <a href="{{ route('users.create')}}" class="btn btn-success" data-toggle="modal" data-target="#userModal">Add User</a>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
      </div>
    </div> 

    <!-- Modal -->
    <div class="modal fade" id="userEditModal" tabindex="-1" role="dialog" aria-labelledby="userEditModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
      </div>
    </div>

    <div class="modal fade" id="confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <!--  <h4 class="modal-title">Delete Confirmation</h4> -->
                   <h1><i class='fa fa-scissors'></i> Delete Confirmation</h1>
                </div>
                <div class="modal-body">
                    <p class="lead">Are you sure you, want to delete {{$user->name}}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" id="delete-btn">Delete</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>          

</div>

@endsection