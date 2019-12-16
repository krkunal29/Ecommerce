function loadcategory()
{
var html = '<option value="">Select Category</option>';
for(let k of categoryList.keys()){
  let categoryname = categoryList.get(k);
  html +='<option value='+categoryname.categoryId+'>'+categoryname.category+'</option>';
}
$("#categoryId").html(html);
}
$("#categoryId").select2();
loadcategory();

function getSubCategory(categoryId){
  $.ajax({
    url:url+'getAllSubCategory.php',
    type:'POST',
    dataType:'json',
    data:{categoryId:categoryId},
    success:function(response){
      var html = '<option value="">Select Category</option>';
      if(response.Responsecode == 200){
        var count = response.Data.length;
        for(var i=0;i<count;i++){
          html +='<option value='+response.Data[i].subcategoryId+'>'+response.Data[i].subcategoryName+'</option>';
        }
      }
      $('#subcategoryId').html(html);
    }
  });
}