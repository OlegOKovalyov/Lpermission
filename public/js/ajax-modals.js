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

  function returnCheckboxSelect() {
  var chkbox = document.getElementsByName('roles[]');
  var vals = "";
  for (var i=0, n=chkbox.length;i<n;i++) {
      if (chkbox[i].checked) 
      {
          var label = "#roles_chbxs" + i;
          vals += " " + $(label).text();
      }
  }
  return(vals); 
}

/* Create 'Add User' modal AJAX form */
$(document).on('click', '.create-modal', function(){
  $('#create').modal('show');
  $('.form-horizontal').show();
  $('.modal-title').text('Add New User');
});  

$("#add-modal").click(function(e){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
      }
    })    
    e.preventDefault();
    var data = $('.form-horizontal').serialize();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: "{{ url('/users/addUser') }}",
        data: data,
        success: function(data) {
          if ((data.errors)) {
            $('.error').removeClass('hidden');
            $('.error').text(data.errors.name);
            $('.error').text(data.errors.email);
            $('#create').modal('hide');
            alert("Bad submit");
          } else {
            $('.error').remove(); 
            $('#table').append("<tr class='user_" + data.id + "'>"+
              //"<td>" + data.id + "</td>"+
              "<td>" + data.name + "</td>"+
              "<td>" + data.email + "</td>"+
              "<td>" + data.created_at + "</td>"+
              "<td>" + returnCheckboxSelect() + "</td>"+
              "<td class='with-buttons'>" +
              
                "<a  href='/users/{{ $user->id }}/edit' class='edit-modal btn btn-primary btn-xs edit' data-id='{{$user->id}}' data-name='luser' data-email='{{$user->email}}' data-toggle='modal' data-target='#userEditModal'>" +
                    "<span class='glyphicon glyphicon-edit'></span>" + " Edit" +
                "</a>" +

                "<form method='POST' action='/users/{{$user->id}}' accept-charset='UTF-8'>" + "<input name='_method' type='hidden' value='DELETE'>" + "<input name='_token' type='hidden'>" +
                  "<button onclick='return confirm(" + "Are you sure you want to delete {{ $user->name }}?" + ")' class='btn btn-danger btn-xs' name='delete' data-id='" + data.id + "' data-title='" + data.name + "' data-body='" + data.email + "'>" +
                    "<i class='glyphicon glyphicon-remove'>" + "</i>" + "Delete" + 
                  "</button>" + 
                "</form>" +

              "</td>" +
            "</tr>");
            $('#create').modal('hide');
            alert('New User \"' +  data.name + '\" has been Created Successfully!');
            $('.form-horizontal').trigger('reset');
          }
        }
    })
    // .done(function(responce){
    //     alert(responce);
    //     // getPageData();
    //     // $("#create").modal('hide');
    //     // alert('Item Created Successfully.');
    // });
    
    // alert($('input[type=checkbox]').val());

});

// Function Add(Save)
// $("#add-modal").click(function() {
// $.ajax({
//   type: 'POST',
//   url: '/users/addUser',
//   data: {
//     '_token': $('input[name=_token]').val(),
//     'name': $('input[name=name]').val(),
//     'email': $('input[name=email]').val(),
//     'password': $('input[name=password]').val(),
//     'roles': $('input[type=checkbox]').val(),
//   },
//   success: function(data){
//     if ((data.errors)) {
//       $('.error').removeClass('hidden');
//       $('.error').text(data.errors.name);
//       $('.error').text(data.errors.email);
//     } else {
//       alert('test no-error');
//       $('.error').remove(); 
//       $('#table').append("<tr class='user_" + data.id + "'>"+
//       //"<td>" + data.id + "</td>"+
//       "<td>" + data.name + "</td>"+
//       "<td>" + data.email + "</td>"+
//       "<td>" + data.created_at + "</td>"+
//       "<td>" + 'User Role: TODO ' + "</td>"+
//       "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.name + "' data-body='" + data.email + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.name + "' data-body='" + data.email + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.name + "' data-body='" + data.email + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
//       "</tr>");
//     }
//   },
// });
// $('#create').modal('hide');
// $('#create').modal('hide'); 
// alert("New user was added in database!");   
// $('#name').val();
// $('#email').val();
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
