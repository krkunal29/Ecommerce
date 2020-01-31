$('#blogform').on('submit', function(e) {
    e.preventDefault();
var fdata = new FormData(this);
fdata.append('sliderId',sliderId);
        $.ajax({
        url: url + 'editSlider.php',
        type: 'POST',
        data:fdata,
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
                slider.set(response.Data.Id,response.Data);
                showSlider(slider);
                goback();
               
            } else {
                swal(response.Message);
        }
        }
    });
});
