{{-- \resources\views\roles\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Roles')

@section('content')

<div class="roles">
    <h1><i class="fa fa-key"></i> Roles

    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" data-toggle="dataTable" data-form="deleteForm">

            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>
                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" data-id="{{ $role->id}}" class="btn btn-info pull-left edit-modal" data-toggle="modal" data-target="#roleEditModal0" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'class' =>'form-inline form-delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger delete', 'name' => 'delete_modal']) !!}
                    {!! Form::close() !!}                    

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

   <!--  <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a> -->
    <a href="{{ URL::to('roles/create') }}" class="btn btn-success" data-toggle="modal" data-target="#roleModal">Add Role</a>

    <!-- Modal -->
    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
      </div>
    </div> 

    <!-- Modal -->
    <div class="modal fade" id="roleEditModal" tabindex="-1" role="dialog" aria-labelledby="roleEditModalLabel">
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
                    <p class="lead">Are you sure you want to delete {{$role->name}}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" id="delete-btn">Delete</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>  

      {{-- Modal Form Edit and Delete Role --}}
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">
          <div class="form-group">
            <label class="control-label col-sm-2"for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="role-name">Role Name</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="name" name="name" placeholder="{{ $role->name }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="assign-permissions">Assign Permissions</label>
            <div class="col-sm-10">
            <!-- <input type="checkbox" class="form-control" id="b"> -->
            <input type="checkbox" name="vehicle1" value="Bike"> {{ $role->permissions()->pluck('name') }}
            </div>
          </div>
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="title"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <span class="glyphicon glyphicon-remove"></span>Close
        </button>
      </div>
    </div>
  </div>
</div>

</div>

@endsection