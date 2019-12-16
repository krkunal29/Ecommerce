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
$('#subcategoryform').on('submit', function(e) {
    e.preventDefault();
    var subcategoryval = $("#subcategoryval").val();
    var categoryId =$("#categoryId").val();
    if(subcategoryval===""){
      alert("Enter Sub Category");
    }
    else {
        $.ajax({
        url: url + 'addsubCategory.php',
        type: 'POST',
        data:{
          categoryId:categoryId,
          category:subcategoryval
        },
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                subCategoryList.set(response.Data[0].subcategoryId,response.Data[0]);
                showcategory(subCategoryList);
                swal(response.Message);
                goback();
            } else {
                swal(response.Message);
            }
        }
    });
  }
});
</script>
