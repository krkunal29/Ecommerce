<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Update New Blog</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="blogform" method="POST">
              <div class="row">
                      <div class="col-md-4">
                      <input type="hidden" id="blogId" name="blogId" />
                      </div>
                  <div class="col-md-4" style="text-align: center;">
                          <div class="form-group">
                          <img id="prevImage" name="prevImage" src="" class="img-circle" alt="No Image" width="100" height="100"/>
                          </div>
                      </div>
                      <div class="col-md-4"></div>
                  </div>
                  <div class="row">

                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="productDesc">Blog Title</label>
                              <input type="text" class="form-control" name="blogTitle" id="blogtitle" placeholder="Enter Blog Title" >
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="productDesc">Blog Category</label>
                              <select class="form-control select2" name="categoryId" id="blogcategoryId" >

                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="productDesc">Blog Url</label>
                              <input type="text" class="form-control" name="blogUrl" id="blogurl" placeholder="Enter Blog URL">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                   

                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="productDesc">Blog Status</label>
                              <select class="form-control select2" id="blogStatus" name="blogStatus">
                                <option value="">Select Blog Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                              </select>
                          </div>
                      </div>
                      <div class="col-sm-6"></div>

                  </div>
                  <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                    <label for="productDesc">Blog Content</label>
                                    </div>
                                    <div class="card-body">
                                        <textarea class="form-control html-editor" rows="5" name="blogContent" id="blogcontent"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Brand Image</label>
                            <input type="file" name="imgname" id="imgname" class="form-control" accept="image/*" onchange="loadFile(event)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="output">Brand Image view</label>
                            <img src="" alt="" id="output" width="110px" height="110px">
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
<script src="jscode/loadFile.js"></script>
<script src="validation/blogval.js"></script>
<!-- <script src="jscode/quiz_validation.js"></script> -->
<script>
function loadDetails(blogs){
// console.log(blogs);
$("#blogId").val(blogs.blogId);
$("#blogtitle").val(blogs.blogTitle);
$("#blogcategoryId").val(blogs.categoryId);
$("#blogcontent").val(blogs.blog);
$("#blogurl").val(blogs.blogUrl);
$("#blogStatus").val(blogs.blogStatus).trigger('change');
var src = url + "blog/" + blogs.blogId + ".jpg";
$('#prevImage').attr("src", src);
}
function loadcategory()
{
// console.log(blogcategoryList);
var html = '<option value="">Select Blog Category</option>';
for(let k of blogcategoryList.keys())
{
  let categoryname = blogcategoryList.get(k);
  html +='<option value='+categoryname.categoryId+'>'+categoryname.category+'</option>';
}
$("#blogcategoryId").html(html);
loadDetails(details);
}
$("#blogcategoryId").select2();
loadcategory();
$("#blogStatus").select2();


</script>
<script>
 $('.html-editor').summernote({
      height: 300,
      tabsize: 2
    });
</script>

<script src="savecode/edit_blog.js" charset="utf-8"></script>
