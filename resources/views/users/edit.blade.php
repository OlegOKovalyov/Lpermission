
<div class='modal-window'>    
    <div class="modal-header">
        <h1><i class='fa fa-user-plus'></i> Edit User php</h1>
    </div>

    <div class="modal-body">
        {{ Form::model($user, array('route' => array('users.edit', $user->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'role' => "form")) }}{{-- Form model binding to automatically populate our fields with user data --}}

        <div class="form-group">
            {{ Form::label('id', 'ID') }}
            {{ Form::text('id', null, array('class' => 'form-control', 'id' => 'fid', 'disabled')) }}
        </div>        
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'id' => 't')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control', 'id' => 'd')) }}
        </div>

        <h5><b>Give Role</b></h5>
        <div class='form-group'>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

            @endforeach
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password') }}<br>
            {{ Form::password('password', array('class' => 'form-control')) }}

        </div>
        <div class="form-group">
            {{ Form::label('password', 'Confirm Password') }}<br>
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

        </div>
        <div class="deleteContent hidden">
            Are you Sure you want to delete <span class="title"></span> ?
            <span class="hidden id"></span>
        </div>
        <div class="modal-footer">
        {{ Form::submit('Update php', array('class' => 'btn btn-primary actionBtn edit pull-left', 'data-dismiss' => 'modal')) }}
        <span id="footer_action_button" class='glyphicon'> </span>
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
        <span class='glyphicon glyphicon-remove'>Close</span>        
        </div>

        {{ Form::close() }}
    </div>

</div>
