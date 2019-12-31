function loadinnersubcategory()
{

  var html = '<option value="">Select Inner Sub Category</option>';
  for(let k of subinnerCategoryList.keys())
  {
    let lastsubcategoryname = subinnerCategoryList.get(k);
     // console.log(lastsubcategoryname);
    html +='<option value='+lastsubcategoryname.innersubcategoryId+'>'+lastsubcategoryname.innersubcategoryName+'</option>';
  }
$("#innersubcategoryId").html(html);
}
$("#innersubcategoryId").select2();
loadinnersubcategory();
