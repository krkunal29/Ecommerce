<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add Update Last Sub Category</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="lastsubcategoryform" method="POST">

                <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="productDesc">Category</label>
                          <select class="form-control select2" id="categoryId" name="categoryId">

                          </select>
                      </div>
                  </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Last Category</label>
                            <input type="text" class="form-control" id="subcategoryval" placeholder="Enter Last Sub Category">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="button" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script>
function loadDetails(values){

$("#subcategoryval").val(values.lastsubcategoryName);
$("#categoryId").val(values.innersubcategoryId).trigger('change');
}

function loadcategory()
{

var html = '<option value="">Select Inner Sub Category</option>';
for(let k of subinnerCategoryList.keys())
{
  let lastsubcategoryname = subinnerCategoryList.get(k);
   // console.log(lastsubcategoryname);
  html +='<option value='+lastsubcategoryname.innersubcategoryId+'>'+lastsubcategoryname.innersubcategoryName+'</option>';
}
$("#categoryId").html(html);
loadDetails(details);
}
$("#categoryId").select2();
loadcategory();
</script>
<script src="savecode/edit_lastsubcategory.js" charset="utf-8"></script>
