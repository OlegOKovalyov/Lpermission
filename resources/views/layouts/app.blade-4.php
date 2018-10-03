<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="{!! csrf_token() !!}" />
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  {{ auth()->user()->name }} - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ route('roles.index') }}"><i class="fa fa-link"></i> <span>Manage Roles</span></a></li>
        <li><a href="{{ route('permissions.index')}}"><i class="fa fa-link"></i> <span>Manage Permissions</span></a></li>

        <li><a href="{{ route('categories.index') }}"><i class="fa fa-link"></i> <span>Categories</span></a></li>


        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Manage Users</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('users.create')}}">Create User</a></li>
            <!-- <li><a href="{{ route('users.create')}}" data-toggle="modal" data-target="#myModal">Create User</a></li> -->
            <li><a href="{{ route('users.index')}}">User List</a></li>
            <!-- <li><a href="{{ route('users.index')}}" data-toggle="modal" data-target="#myModal">User List</a></li> -->

          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Manage Posts</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('posts.create') }}">Create Post</a></li>
            <li><a href="{{ route('posts.index') }}">Post List</a></li>
          </ul>
        </li>        

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


{{--------------------------}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
{{---------------------------}}



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">UAD Systems</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    </div>
  </div>
</div> 

</div>
<!-- ./wrapper -->

<!-- <meta name="_token" content="{!! csrf_token() !!}" /> -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->

<!-- Bootstrap 3.3.7 -->
<!-- <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('js/sm-validator.js') }}"></script>
<script src="{{ asset('js/sm-validator-config.js') }}"></script>

<script src="{{ asset('js/date-phpformat-func.js') }}"></script>

<script src="{{ asset('js/ajax-crud-user.js') }}" ></script>

<script>
/* {{-- Ajax Form Delete --}} */
$(document).ready(function(){
    $('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
        e.preventDefault();
        var $form=$(this);
        $('#confirm').modal({ backdrop: 'static', keyboard: false })
            .on('click', '#delete-btn', function(){
                $form.submit();
            });
    }); 
});    


/* {{-- Ajax Form Add User --}} */
$(document).ready(function() {

  function returnCheckboxSelect() { // выводит массив из названий выбранных меток <input type="checkbox"...>
    var chkbox = document.getElementsByName('roles[]');
    var vals = "";
    for (var i=0, n=chkbox.length;i<n;i++) {
        if (chkbox[i].checked) 
        {
          var label = ".roles_chbxs" + i;
          vals += " " + $(label).text();
        }
    }
    return(vals); 
  }

  // function returnCheckboxSelectEdit() { // выводит массив из названий выбранных меток <input type="checkbox"...>
  //   var chkbox = document.getElementsByName('roles[]');
  //   var vals = "";
  //   for (var i=0, n=chkbox.length;i<n;i++) {
  //       if (chkbox[i].checked) 
  //       {
  //         var label = ".roles_chbxs_edit" + i;
  //         vals += " " + $(label).text();
  //       }
  //   }
  //   return(vals); 
  // }  

  // function returnCheckboxes(divId) { // выводит массив из названий выбранных меток <input type="checkbox"...>
  //   var chkbox = document.getElementsByName('roles[]');
  //   var vals = "";
  //   for (var i=0, n=chkbox.length;i<n;i++) {
  //       if (chkbox[i].checked) 
  //       {
  //         var label = divId + " " + ".roles_chbxs_edit" + i;
  //         vals += " " + $(label).text();
  //       }
  //   }
  //   return(vals); 
  // }  

  function parseDateInPhpFormat() { // преобразует дату из '2018-09-23 08:58:34' в 'September 23, 2018 8:57am'
    var d = new Date(); 
    return d_string = d.format("F d, Y h:ia");
  }

/* Create 'Add User' modal AJAX form *************************************************************************/
$(document).on('click', '.add-user-modal', function(){
  $('#createUser').modal('show');
  $('#createUser .form-horizontal').trigger('reset');
  $('#createUser .form-horizontal').show();
  $('#createUser .modal-title').html("<i class='fa fa-user-plus' style='margin-left:1rem;'></i>Add User");
});  

$("#add-modal").click(function(e){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
    })    
    e.preventDefault();
    var data = $('#createUser .form-horizontal').serialize();
    $.ajax({
      dataType: 'json',
      type:'POST',

      url: '/users/addUser',
      data: data,
      success: function(result) {
        if ((result.errors)) {
          $('#createUser .alert-warning').html('');
          $.each(result.errors, function(key, value){
            $('#createUser .alert-warning').show();
            $('#createUser .alert-warning').append('<li>' + value + ' ' + '</li>');
          });
        } else {console.log(result);
          $('.error').remove(); 
          $('#table').append("<tr class='user_" + result.id + "'>"+
            "<td>" + result.name + "</td>"+
            "<td>" + result.email + "</td>"+
            "<td>" + parseDateInPhpFormat() + "</td>"+

            "<td>" + returnCheckboxSelect() + "</td>"+
            "<td class='with-buttons'>" +
            
              "<a  href='/users/" + result.id + "/edit' class='edit-user-modal btn btn-primary btn-xs edit' data-id='" + result.id + "' data-name='" + result.name + "' data-email='" + result.email + "' data-toggle='modal' data-target='#userEditModal'>" +
                  "<span class='glyphicon glyphicon-edit'></span>" + " Edit" +
              "</a>" +

              "<form method='POST' action='/users/" + result.id + "' accept-charset='UTF-8'>" + "<input name='_method' type='hidden' value='DELETE'>" + "<input name='_token' type='hidden'>" +
                "<button onclick='return confirm(" + "Are you sure you want to delete " + result.name + "?" + ")' class='btn btn-danger btn-xs' name='delete' data-id='" + result.id + "' data-title='" + result.name + "' data-body='" + result.email + "'>" +
                  "<i class='glyphicon glyphicon-remove'>" + "</i>" + "Delete" + 
                "</button>" + 
              "</form>" +

            "</td>" +
          "</tr>");
          $('#createUser .alert-warning').html('');
          $('#createUser .alert-warning').hide();
          $('#createUser .alert-success').html('\"<strong>' +  result.name + '</strong>\" has been created successfully!');
          $('#createUser .alert-success').fadeIn("slow");
          setTimeout(function () {
            $('#createUser .alert-success').fadeOut("slow");
            $('#createUser .alert-success').hide();
            $('#createUser').modal('hide');
          }, 2000);
          // alert('\"' +  result.name + '\" has been created successfully!');
          $('#createUser .form-horizontal').trigger('reset');
        }
      }
    })
  });


/* {{-- Ajax Form Edit User --}} *****************************************************************************/
$(document).on('click', '.edit-user-modal', function() {
  $('#editUser .form-horizontal').show();
  $('#editUser .modal-title').html("<i class='fa fa-user-plus' style='margin-left:1rem;'></i>Edit User");
  // $('#fid').val($(this).data('id'));
  // $('#editUser input[name=name]').val($(this).data('name'));
  // $('#editUser input[name=email]').val($(this).data('email'));
  // $('#editUser input[name=password]').val($(this).data('password'));
  var id = $(this).data('id');
  var name = $(this).data('name');
  var email = $(this).data('email');
  var password = $(this).data('password');
  $('#editUser').modal('show');

  $('#fid').val(id);
  $('#editUser input[name=name]').val(name);
  $('#editUser input[name=email]').val(email);
  $('#editUser input[name=password]').val(password);
  
  // $('#editUser').modal('show');
});

$('#edit-modal').click(function(e) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('input[name=_token]').val()
    }
  })  
  e.preventDefault();
  var serdata = $(this).serialize(); console.log(serdata);

  $.ajax({
    dataType: 'json',
    type: 'POST',

    url: '/users/' + serdata.id + '/editUser',

    data: {
      // '_token': $('input[name=_token]').val(),
      'id': $("#fid").val(),
      'name': $('#editUser input[name=name]').val(),
      'email': $('#editUser input[name=email]').val(),
      'password': $('#editUser input[name=password]').val()
    },
    success: function(data) {console.log(serdata);
      // $('.post' + data.id).replaceWith(" "+
      // "<tr class='post" + data.id + "'>"+
      // "<td>" + data.id + "</td>"+
      // "<td>" + data.title + "</td>"+
      // "<td>" + returnCheckboxes('roles_checkboxes_edit') + "</td>"+
      // "<td>" + data.created_at + "</td>"+
      // "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
      // "</tr>");
    }
  });
});

// form Delete function
// $(document).on('click', '.deleteUser', function() {
//   $('#footer_action_button').text(" Delete");
//   $('#footer_action_button').removeClass('glyphicon-check');
//   $('#footer_action_button').addClass('glyphicon-trash');
//   $('.actionBtn').removeClass('btn-success');
//   $('.actionBtn').addClass('btn-danger');
//   $('.actionBtn').addClass('delete');
//   $('.modal-title').text('Delete Post');
//   $('.id').text($(this).data('id'));
//   $('.deleteContent').show();
//   $('.form-horizontal').hide();
//   $('.title').html($(this).data('title'));
//   $('#myModal').modal('show');
// });

// $('.modal-footer').on('click', '.delete', function(){
//   $.ajax({
//     type: 'POST',
//     url: 'deletePost',
//     data: {
//       '_token': $('input[name=_token]').val(),
//       'id': $('.id').text()
//     },
//     success: function(data){
//        $('.post' + $('.id').text()).remove();
//     }
//   });
// });




}); // ОКОНЧАНИЕ ready()


  // Edit Data (Modal and function edit data)
//     $(document).on('click', '.edit-modal', function() {
//     $('#footer_action_button').text(" Update JS");
//     $('#footer_action_button').addClass('glyphicon-check');
//     $('#footer_action_button').removeClass('glyphicon-trash');
//     $('.actionBtn').addClass('btn-info');
//     $('.actionBtn').removeClass('btn-danger');
//     $('.actionBtn').addClass('edit');
//     $('.modal-title').text('Edit User JS');
//     $('.deleteContent').hide();
//     $('.form-horizontal').show();
//     $('#fid').val($(this).data('id'));
//     $('#t').val($(this).data('name'));
//     $('#d').val($(this).data('email'));
//     $('#rid').val($(this).data('role'));
//     $('#d').val($(this).data('password'));
//     $('#d').val($(this).data('confirm_password'));
//     $('#myModal').modal('show');
// });
//   $('.modal-footer').on('click', '.edit', function() {
//   $.ajax({
//       type: 'post',
//       url: '/roles' + data.id + '/edit',
//       url: '/users' + data.id + '/update',
//       url: '/edit',
//       data: {
//           '_token': $('input[name=_token]').val(),
//           'id': $("#fid").val(),
//           'name': $('#t').val(),
//           'email': $('#d').val(),
//           'role' : $('#rid').val(),
//           'password': $('#password').val(),
//           'password_confirmation': $('#password_confirmation').val()
//       },
//       success: function(data) {
//           $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.email + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.name + "' data-description='" + data.email + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' data-email='" + data.email + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
//       }
//   });
// });
// add function
// $("#add").click(function() {
//   $.ajax({
//     type: 'post',
//     url: '/add',
//     data: {
//       '_token': $('input[name=_token]').val(),
//       'title': $('input[name=title]').val(),
//       'description': $('input[name=description]').val()
//     },
//     success: function(data) {
//       if ((data.errors)) {
//         $('.error').removeClass('hidden');
//         $('.error').text(data.errors.title);
//         $('.error').text(data.errors.description);
//       } else {
//         $('.error').remove();
//         $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.description + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-description='" + data.description + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
//       }
//     },
//   });
//   $('#title').val('');
//   $('#description').val('');
// });

//delete function
// $(document).on('click', '.delete-modal', function() {
//   $('#footer_action_button').text(" Delete");
//   $('#footer_action_button').removeClass('glyphicon-check');
//   $('#footer_action_button').addClass('glyphicon-trash');
//   $('.actionBtn').removeClass('btn-success');
//   $('.actionBtn').addClass('btn-danger');
//   $('.actionBtn').addClass('delete');
//   $('.modal-title').text('Delete');
//   $('.id').text($(this).data('id'));
//   $('.deleteContent').show();
//   $('.form-horizontal').hide();
//   $('.title').html($(this).data('title'));
//   $('#myModal').modal('show');
// });

// $('.modal-footer').on('click', '.delete', function() {
//   $.ajax({
//     type: 'post',
//     url: '/deleteItem',
//     data: {
//       '_token': $('input[name=_token]').val(),
//       'id': $('.id').text()
//     },
//     success: function(data) {
//       $('.item' + $('.id').text()).remove();
//     }
//   });
// });
</script>
<script>
  // For 'Categories' Menu Option - 'Edit' button
  $('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget);
      var title = button.data('mytitle');
      var description = button.data('mydescription');
      var cat_id = button.data('catid');

      var modal = $(this);

      modal.find('.modal-body #title').val(title);
      modal.find('.modal-body #des').val(description);
      modal.find('.modal-body #cat_id').val(cat_id);
  })
</script>
<script>
  // For 'Categories' Menu Option - 'Delete' button
  $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget);

      var cat_id = button.data('catid');
      var modal = $(this);

      modal.find('.modal-body #cat_id').val(cat_id);
  })
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>