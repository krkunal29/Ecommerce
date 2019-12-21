$('#subcategoryform').on('submit', function(e) {
    e.preventDefault();
    var subcategoryval = $("#subcategoryval").val();
    var categoryId =$("#categoryId").val();
    if(subcategoryval===""){
      swal("Enter Sub Category");
    }
    else {
        $.ajax({
        url: url + 'addsubCategory.php',
        type: 'POST',
        data:{
          categoryId:categoryId,
          category:subcategoryval
        },
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                subCategoryList.set(response.Data[0].subcategoryId,response.Data[0]);
                showcategory(subCategoryList);
                swal({
                  position: 'top-end',
                  icon: 'success',
                  title: response.Message,
                  Button: false,
                  timer: 1500
              })
                goback();
            } else {
                swal(response.Message);
            }
        }
    });
  }
});
