/* {{-- Ajax Form Add User --}} */
$(document).ready(function() {

  function returnCheckboxSelect() { // выводит массив из названий выбранных меток <input type="checkbox"...>
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

  function parseDateInPhpFormat() { // преобразует дату из '2018-09-23 08:58:34' в 'September 23, 2018 8:57am'
    var d = new Date(); 
    return d_string = d.format("F d, Y h:ia");
  }

/* Create 'Add User' modal AJAX form */
$(document).on('click', '.create-modal', function(){
  $('#create').modal('show');
  $('.form-horizontal').show();
  $('.modal-title').html("<i class='fa fa-user-plus' style='margin-left:1rem;'></i>Add New User");
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
      success: function(result) {
        if ((result.errors)) {
          $('.alert-warning').html('');
          $.each(result.errors, function(key, value){
            $('.alert-warning').show();
            $('.alert-warning').append('<li>'+value+'</li>');
          });
        } else {
          $('.error').remove(); 
          $('#table').append("<tr class='user_" + result.id + "'>"+
            "<td>" + result.name + "</td>"+
            "<td>" + result.email + "</td>"+
            "<td>" + parseDateInPhpFormat() + "</td>"+
            // {{-- "<td>" + "{{ $user->created_at->format('F d, Y h:ia') }}" + "</td>"+ // работает, но ломает другие страницы --}}
            "<td>" + returnCheckboxSelect() + "</td>"+
            "<td class='with-buttons'>" +
            
              "<a  href='/users/" + result.id + "/edit' class='edit-modal btn btn-primary btn-xs edit' data-id='" + result.id + "' data-name='" + result.name + "' data-email='" + result.email + "' data-toggle='modal' data-target='#userEditModal'>" +
                  "<span class='glyphicon glyphicon-edit'></span>" + " Edit" +
              "</a>" +

              "<form method='POST' action='/users/" + result.id + "' accept-charset='UTF-8'>" + "<input name='_method' type='hidden' value='DELETE'>" + "<input name='_token' type='hidden'>" +
                "<button onclick='return confirm(" + "Are you sure you want to delete " + result.name + "?" + ")' class='btn btn-danger btn-xs' name='delete' data-id='" + result.id + "' data-title='" + result.name + "' data-body='" + result.email + "'>" +
                  "<i class='glyphicon glyphicon-remove'>" + "</i>" + "Delete" + 
                "</button>" + 
              "</form>" +

            "</td>" +
          "</tr>");
          $('.alert-warning').html('');
          $('.alert-warning').hide();
          $('#create').modal('hide');
          // alert('\"' +  result.name + '\" has been created successfully!');
          $('.form-horizontal').trigger('reset');
        }
      }
    })
  });


}); // ОКОНЧАНИЕ ready()