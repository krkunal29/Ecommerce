$('#categoryform').on('submit', function(e) {
    e.preventDefault();
    var categoryval = $("#categoryval").val();

    if(categoryval===""){
      swal("Enter Category");
    }
    else {
      var obj = {
        categoryId: userId,
        category:categoryval
        };
        $.ajax({
        url: url + 'editProductCategory.php',
        type: 'POST',
        data:obj,
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                categoryList.set(userId.toString(),obj);
                showcategory(categoryList);
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
