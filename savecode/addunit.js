$('#unitform').on('submit', function(e) {
    e.preventDefault();
    var unitval = $("#unitval").val();
    if(unitval===""){
      swal("Enter Unit");
    }
    else {
    $.ajax({
        url: url + 'addUnit.php',
        type: 'POST',
        data:{
          unit:unitval
        },
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                unitList.set(response.Data[0].unitId, response.Data[0]);
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
                swal(response.Message);
            }
        }
    });
  }
});
