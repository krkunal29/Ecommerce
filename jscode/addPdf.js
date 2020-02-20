$('#firmForm').on('submit', function(e) {
    e.preventDefault();
        $.ajax({
        url: url + 'updatePdfDetails.php',
        type: 'POST',
        data:new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
          if (response.Responsecode == 200) {
                swal({
                  position: 'top-end',
                  icon: 'success',
                  title: response.Message,
                  Button: false,
                  timer: 1500
              });
            } else {
                swal(response.Message);
        }
        }
    });

});
