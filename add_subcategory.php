<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add New Sub Category</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="subcategoryform" method="POST">

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
                            <label for="productDesc">Sub Category</label>
                            <input type="text" class="form-control" id="subcategoryval" placeholder="Enter Sub Category">
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
function loadcategory()
{

var html = '<option value="">Select  Category</option>';
for(let k of categoryList.keys())
{
  let categoryname = categoryList.get(k);
  html +='<option value='+categoryname.categoryId+'>'+categoryname.category+'</option>';
}
$("#categoryId").html(html);
}
$("#categoryId").select2();
loadcategory();

</script>
<script src="savecode/addsubcategory.js">

</script>
