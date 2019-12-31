$('#innersubcategoryform').on('submit', function(e) {
    e.preventDefault();
    var subcategoryval = $("#subcategoryval").val();
    var categoryId =$("#categoryId").val();
    if(subcategoryval===""){
      swal("Enter Inner Sub Category");
    }
    else {
        $.ajax({
        url: url + 'addinnersubCategory.php',
        type: 'POST',
        data:{
          categoryId:categoryId,
          category:subcategoryval
        },
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                subinnerCategoryList.set(response.Data[0].innersubcategoryId,response.Data[0]);
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
                swal(response.Message);
            }
        }
    });
  }
});
