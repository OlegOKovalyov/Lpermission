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
                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" data-toggle="modal" data-target="#roleEditModal" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

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
                    <p>Are you sure you, want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>    

   

<!-- <script type="text/javascript">
    $(document).ready(function () {        
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });   
    });
</script> -->


</div>

@endsection