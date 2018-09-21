{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<div class="available-permissions">
    <h1><i class="fa fa-key"></i>Available Permissions

    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" data-toggle="modal" data-target="#permissionEditModal" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a> -->
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success" data-toggle="modal" data-target="#permissionModal">Add Permission</a>

    <!-- Modal -->
    <div class="modal fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="permissionModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="permissionEditModal" tabindex="-1" role="dialog" aria-labelledby="permissionEditModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
      </div>
    </div>  

</div>

@endsection