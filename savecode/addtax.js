$('#taxform').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#taxform").valid();
    if (returnVal) {
        $.ajax({
        url: url + 'addTax.php',
        type: 'POST',
        data:new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                taxList.set(response.Data[0].TaxId,response.Data[0]);
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
                swal(response.Message);
            }
        }
    });
   }
});
