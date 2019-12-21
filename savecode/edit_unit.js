$('#unitform').on('submit', function(e) {
    e.preventDefault();
    var unitval = $("#unitval").val();
    if(unitval===""){
      swal("Enter Unit");
    }
    else {
      var obj = {
        unitId: userId,
        unit:unitval
        };
    $.ajax({
        url: url + 'editUnit.php',
        type: 'POST',
        data:obj,
        dataType: 'json',
        success: function(response) {
            if (response.Responsecode == 200) {
                unitList.set(userId.toString(),obj);
                showUnits(unitList);
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
