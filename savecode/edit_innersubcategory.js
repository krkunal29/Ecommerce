$('#subcategoryform').on('submit', function(e) {
    e.preventDefault();
    var subcategoryval = $("#subcategoryval").val();
    var categoryId =$("#categoryId").val();
    if(subcategoryval===""){
      swal("Enter Inner Sub Category");
    }
    else {
        $.ajax({
        url: url + 'editinnerSubCategory.php',
        type: 'POST',
        data:{
          subcategoryid:userId,
          categoryId:categoryId,
          category:subcategoryval
        },
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                subinnerCategoryList.set(response.Data.innersubcategoryId,response.Data);
                showinnerCategory(subinnerCategoryList);
                swal({
                  position: 'top-end',
                  icon: 'success',
                  title: response.Message,
                  Button: false,
                  timer: 1500
              })
                goback();
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
