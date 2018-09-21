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
                <tr id="role-{{$role->id}}">
                    <td>{{$role->name}}</td>
                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                    <td>
                        <!-- <button class="btn btn-info btn-detail open-modal" value="{{$role->id}}">Edit</button> -->
                        <a href="{{ URL::to('roles/update') }}" class="btn btn-info btn-detail" data-toggle="modal" data-target="#roleEditModal">Edit</a>
                        <button class="btn btn-danger btn-delete delete-role" value="{{$role->id}}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
      
    </div><!-- .table-responsive --> 

    <a href="{{ URL::to('roles/create') }}" class="btn btn-success" data-toggle="modal" data-target="#roleModal">Add Role</a>          

    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Role Editor</h4>
                </div>
                <div class="modal-body">

                    <div class='modal-window'>
                        <?php $permissions = $p_all; ?>

                        <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
                        <hr>

                        {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT' )) }}

                            {{ Form::label('name', 'Role Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}

                        <h5><b>Assign Permissions</b></h5> 
                        <?php //$i=0; ?>
                        @foreach ($permissions as $permission) <?php echo $permission; ?>

                            {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                        <?php //$i++; ?>
                        @endforeach
                        <br>
                        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                        {{ Form::close() }}    
                    </div>                     

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Role Button -->
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

    <!-- Modal Delete Confirmation Button -  -->
    <!-- <div class="modal fade" id="confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   <h1><i class='fa fa-scissors'></i> Delete Confirmation</h1>
                </div>
                <div class="modal-body">
                    <p class="lead">Are you sure you, want to delete {{$role->name}}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" id="delete-btn">Delete</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>  -->

</div>
@endsection