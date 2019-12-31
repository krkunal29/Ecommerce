function loadlastsubcategory()
{

var html = '<option value="">Select  Last Sub Category</option>';
for(let k of sublastCategoryList.keys()){
  let categoryname = sublastCategoryList.get(k);
  html +='<option value='+categoryname.lastsubcategoryId+'>'+categoryname.lastsubcategoryName+'</option>';
}

$("#lastsubcategoryId").html(html);
}
$("#lastsubcategoryId").select2();
loadlastsubcategory();
