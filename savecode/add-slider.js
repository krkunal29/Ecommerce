$('#blogform').on('submit', function(e) {
    e.preventDefault();
        $.ajax({
        url: url + 'addSlider.php',
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
                slider.set(response.Data.Id,response.Data);
                goback();
                showSlider(slider);
               
            } else {
                swal({
                    position: 'top-end',
                    icon: 'warning',
                    title: response.Message,
                    Button: false,
                    timer: 1500
                });
        }
        }
    });
});
