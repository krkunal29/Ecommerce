<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Update New Category</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="categoryform" method="POST">

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Category</label>
                            <input type="text" class="form-control" id="categoryval" placeholder="Enter  Category">
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
$('#categoryform').on('submit', function(e) {
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
        url: url + 'editProductCategory.php',
        type: 'POST',
        data:obj,
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                categoryList.set(userId.toString(),obj);
                showcategory(categoryList);
                goback();
            } else {
                alert(response.Message);
            }
        }
    });
  }
});
</script>
