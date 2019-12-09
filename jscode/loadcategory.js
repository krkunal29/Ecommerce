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
