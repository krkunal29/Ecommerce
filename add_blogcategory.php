<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add New Blog Category</h3></div>
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
<script>

$('#blogcategoryform').on('submit', function(e) {
    e.preventDefault();
    var categoryval = $("#categoryval").val();

    if(categoryval===""){
      alert("Enter Category");
    }
    else {
        $.ajax({
        url: url + 'addBlogCategory.php',
        type: 'POST',
        data:{
          category:categoryval
        },
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                blogcategoryList.set(response.Data[0].categoryId,response.Data[0]);
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
