function loadsubcategory()
{

var html = '<option value="">Select  Sub Category</option>';
for(let k of subCategoryList.keys()){
  let categoryname = subCategoryList.get(k);
  html +='<option value='+categoryname.subcategoryId+'>'+categoryname.subcategoryName+'</option>';
}

$("#subcategoryId1").html(html);
}
$("#subcategoryId1").select2();
loadsubcategory();
