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
                slider.set(response.Data.Id,response.Data);
                showSlider(blogList);
                goback();
                swal({
                  position: 'top-end',
                  icon: 'success',
                  title: response.Message,
                  Button: false,
                  timer: 1500
              });
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
