
function getlastSubCategory(value,m){
  if(m>0){
    $.ajax({
        url: url + 'getAllSublastCategory.php',
        type: 'POST',
        dataType: 'json',
         data: {
          lastcategoryId:value
         },
        success: function(response) {
            if (response.Data != null) {
                 // console.log(response.Data);
                const count = response.Data.length;
                var html = '<option value="">Select Last Sub Category</option>';
                for (var i = 0; i < count; i++) {
                html +='<option value='+response.Data[i].lastsubcategoryId+'>'+response.Data[i].lastsubcategoryName+'</option>';
                }
                $("#lastsubcategoryId").html(html);
                $("#lastsubcategoryId").select2();
            }
        }
    });
  }
  else
  {
  m++;
  }
}


var r=0;
function getlastSubCategory1(value){
  if(r>0){
    $.ajax({
        url: url + 'getAllSublastCategory.php',
        type: 'POST',
        dataType: 'json',
         data: {
          lastcategoryId:value
         },
        success: function(response) {
            if (response.Data != null) {
                 // console.log(response.Data);
                const count = response.Data.length;
                var html = '<option value="">Select Last Sub Category</option>';
                for (var i = 0; i < count; i++) {
                html +='<option value='+response.Data[i].lastsubcategoryId+'>'+response.Data[i].lastsubcategoryName+'</option>';
                }
                $("#lastsubcategoryId").html(html);
                $("#lastsubcategoryId").select2();

            }
        },
        complete:function(){
           console.log("last val"+value);
// $('#lastsubcategoryId').val(value).trigger('change');
        }
    });
  }
  else
  {
  r++;
  }

}
