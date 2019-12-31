$('#lastsubcategoryform').on('submit', function(e) {
    e.preventDefault();
    var subcategoryval = $("#subcategoryval").val();
    var categoryId =$("#categoryId").val();
    if(subcategoryval===""){
      swal("Enter Last Sub Category");
    }
    else {
        $.ajax({
        url: url + 'addlastsubCategory.php',
        type: 'POST',
        data:{
          categoryId:categoryId,
          category:subcategoryval
        },
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                sublastCategoryList.set(response.Data[0].lastsubcategoryId,response.Data[0]);
                showlastCategory(sublastCategoryList);
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
