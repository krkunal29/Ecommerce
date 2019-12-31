
function getSubCategory(value,m){
  if(m>0){
    $.ajax({
        url: url + 'getAllSubCategory.php',
        type: 'POST',
        dataType: 'json',
         data: {
          categoryId:value
         },
        success: function(response) {
            if (response.Data != null) {
                 // console.log(response.Data);
                const count = response.Data.length;
                var html = '<option value="">Select  Sub Category</option>';
                for (var i = 0; i < count; i++) {
                html +='<option value='+response.Data[i].subcategoryId+'>'+response.Data[i].subcategoryName+'</option>';
                }
                $("#subcategoryId").html(html);
                $("#subcategoryId").select2();
            }
        }
    });
  }
  else
  {
  m++;
  }
}


var n=0;
function getSubCategory1(value){
  if(n>0){
    $.ajax({
        url: url + 'getAllSubCategory.php',
        type: 'POST',
        dataType: 'json',
         data: {
          categoryId:value
         },
        success: function(response) {
            if (response.Data != null) {
                 // console.log(response.Data);
                const count = response.Data.length;
                var html = '<option value="">Select  Sub Category</option>';
                for (var i = 0; i < count; i++) {
                html +='<option value='+response.Data[i].subcategoryId+'>'+response.Data[i].subcategoryName+'</option>';
                }
                $("#subcategoryId").html(html);
                $("#subcategoryId").select2();
            }
        }
    });
  }
  else
  {
  n++;
  }

}
