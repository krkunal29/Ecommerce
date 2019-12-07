<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Update New Blog Category</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="blogcategoryform" method="POST">

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Blog Category</label>
                            <input type="text" class="form-control" id="categoryval" placeholder="Enter Blog Category">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="button" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">


function loadDetails(categoryval){
    $('#categoryval').val(categoryval.category);

}
loadDetails(details);
$('#blogcategoryform').on('submit', function(e) {
    e.preventDefault();
    var categoryval = $("#categoryval").val();

    if(categoryval===""){
      alert("Enter Category");
    }
    else {
      var obj = {
        categoryId: userId,
        category:categoryval
        };
        $.ajax({
        url: url + 'editBlogCategory.php',
        type: 'POST',
        data:obj,
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                blogcategoryList.set(userId.toString(),obj);
                showblogcategory(blogcategoryList);
                goback();
            } else {
                alert(response.Message);
            }
        }
    });
  }
});
</script>
