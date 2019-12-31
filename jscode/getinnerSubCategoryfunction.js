
function getinnerSubCategory(value,m){
  if(m>0){
    $.ajax({
        url: url + 'getAllSubinnerCategory.php',
        type: 'POST',
        dataType: 'json',
         data: {
          innercategoryId:value
         },
        success: function(response) {
            if (response.Data != null) {
                 // console.log(response.Data);
                const count = response.Data.length;
                var html = '<option value="">Select Inner Sub Category</option>';
                for (var i = 0; i < count; i++) {
                html +='<option value='+response.Data[i].innersubcategoryId+'>'+response.Data[i].innersubcategoryName+'</option>';
                }
                $("#innersubcategoryId").html(html);
                $("#innersubcategoryId").select2();
            }
        }
    });
  }
  else
  {
  m++;
  }
}


var q=0;
function getinnerSubCategory1(value){
  // console.log("inner"+value);
  if(q>0){
    $.ajax({
        url: url + 'getAllSubinnerCategory.php',
        type: 'POST',
        dataType: 'json',
         data: {
          innercategoryId:value
         },
        success: function(response) {
            if (response.Data != null) {
                 // console.log(response.Data);
                const count = response.Data.length;
                var html = '<option value="">Select Inner Sub Category</option>';
                for (var i = 0; i < count; i++) {
                html +='<option value='+response.Data[i].innersubcategoryId+'>'+response.Data[i].innersubcategoryName+'</option>';
                }
                $("#innersubcategoryId").html(html);
                $("#innersubcategoryId").select2();

            }
        },
        complete:function(){
     console.log("inner val"+value);
    //     $('#innersubcategoryId').val(value).trigger('change');
        }
    });
  }
  else
  {
  q++;
  }

}
