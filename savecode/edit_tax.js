$('#taxform').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#taxform").valid();
    if (returnVal) {
        $.ajax({
        url: url + 'editTax.php',
        type: 'POST',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                taxList.set(response.Data.TaxId,response.Data);
                showTaxs(taxList);
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
