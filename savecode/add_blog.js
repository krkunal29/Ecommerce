$('#blogform').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#blogform").valid();
    if (returnVal) {

        $.ajax({
        url: url + 'addBlogs.php',
        type: 'POST',
        data:new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
          if (response.Responsecode == 200) {
                // console.log(response);
                blogList.set(response.Data[0].blogId,response.Data[0]);
                showblog(blogList);
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
