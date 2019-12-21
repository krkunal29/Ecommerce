$('#blogcategoryform').on('submit', function(e) {
    e.preventDefault();
    var categoryval = $("#categoryval").val();

    if(categoryval===""){
      swal("Enter Category");
    }
    else {
        $.ajax({
        url: url + 'addBlogCategory.php',
        type: 'POST',
        data:{
          category:categoryval
        },
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                blogcategoryList.set(response.Data[0].categoryId,response.Data[0]);
                showblogcategory(blogcategoryList);
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
