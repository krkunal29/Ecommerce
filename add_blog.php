<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add New Blog</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="blogform" method="POST">

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Blog Title</label>
                            <input type="text" class="form-control" id="blogtitle" placeholder="Enter Blog Title">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Blog Category</label>
                            <select class="form-control select2" id="blogcategoryId" name="categoryId">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Blog Content</label>
                            <!-- <input type="text" class="form-control" id="blogcontent" placeholder="Enter Blog Content"> -->
                            <textarea class="form-control" id="blogcontent" placeholder="Enter Blog Content" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Blog Url</label>
                            <input type="text" class="form-control" id="blogurl" placeholder="Enter Blog URL">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Blog Status</label>
                            <select class="form-control select2" id="blogStatus" name="blogStatus">
                              <option value="">Select Blog Status</option>
                              <option value="0">Inactive</option>
                             <option value="1">Active</option>
                            </select>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="button" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery.validate.js"></script>
<!-- <script src="jscode/quiz_validation.js"></script> -->
<script>

function loadcategory()
{

var html = '<option value="">Select Blog Category</option>';
for(let k of blogcategoryList.keys()){
  let categoryname = blogcategoryList.get(k);
  html +='<option value='+categoryname.categoryId+'>'+categoryname.category+'</option>';
}
$("#blogcategoryId").html(html);
}
$("#blogcategoryId").select2();
loadcategory();
$("#blogStatus").select2();

$('#blogform').on('submit', function(e) {
    e.preventDefault();
        var blogTitle = $("#blogtitle").val();
        var categoryId = $("#blogcategoryId").val();
        var blogContent = $("#blogcontent").val();
        var blogUrl = $("#blogurl").val();
        var blogStatus = $("#blogStatus").val();
        var obj ={
          blogTitle:blogTitle,
          categoryId:categoryId,
          blogContent:blogContent,
          blogUrl:blogUrl,
          blogStatus:blogStatus
        };

        $.ajax({
        url: url + 'addBlogs.php',
        type: 'POST',
        data:obj,
        dataType: 'json',
        success: function(response) {
        // console.log(response);
        if (response.Responsecode == 200) {
                blogList.set(response.Data[0].blogId,response.Data[0]);
                showblog(blogList);
                goback();
            } else {
                alert(response.Message);
        }
        }
    });

});
</script>
