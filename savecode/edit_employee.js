$('#customerform').on('submit', function(e) {
  e.preventDefault();
  var returnVal = $("#customerform").valid();
  if (returnVal) {
      $.ajax({
      url: url + 'editUser.php',
      type: 'POST',
      data:new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
          if (response.Responsecode == 200) {
            userList.set(response.Data.userId, response.Data);
              showUsers(userList);
              goback();
              swal({
                position: 'top-end',
                icon: 'success',
                title: response.Message,
                Button: false,
                timer: 1500
            })
             
          } else {
            swal({
              position: 'top-end',
              icon: 'warning',
              title: response.Message,
              Button: false,
              timer: 1500
          })
          }
      }
  });
 }

});
