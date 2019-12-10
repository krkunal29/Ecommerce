<style>
.error{
    color: red;
}
</style>
<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add New Customer</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="customerform" method="POST">
                <input type="hidden" name="roleId" value="2" id="roleId" />
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Middle Name</label>
                            <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Contact Number</label>
                            <input type="text" class="form-control" id="cnumber" name="contactNumber" placeholder="Enter Contact Number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Email Address</label>
                            <input type="email" class="form-control" id="emailaddress" name="emailId" placeholder="Enter Email Address">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Pincode</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode">
                        </div>
                    </div>

                </div>
                <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="productDesc">Contact Address</label>
                          <!-- <input type="text" class="form-control" id="blogcontent" placeholder="Enter Blog Content"> -->
                          <textarea class="form-control" id="customeraddress" placeholder="Enter Customer Address" name="contactAddress" rows="4"></textarea>
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="productDesc">Password</label>
                          <input type="text" class="form-control" id="password" name="upassword" placeholder="Enter Password">
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
<script src="jscode/user_validation.js"></script>
<script>

// function loadcategory()
// {
//
// var html = '<option value="">Select Blog Category</option>';
// for(let k of blogcategoryList.keys()){
//   let categoryname = blogcategoryList.get(k);
//   html +='<option value='+categoryname.categoryId+'>'+categoryname.category+'</option>';
// }
// $("#blogcategoryId").html(html);
// }
// $("#blogcategoryId").select2();
// loadcategory();
// $("#blogStatus").select2();

$('#customerform').on('submit', function(e) {
  e.preventDefault();
  var returnVal = $("#customerform").valid();
  if (returnVal) {
      $.ajax({
      url: url + 'addUser.php',
      type: 'POST',
      data:new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
          // console.log(response);
          if (response.Responsecode == 200) {
            userList.set(response.Data.userId, response.Data);
              showUsers(userList);
              goback();
              swal(response.Message);
          } else {
              alert(response.Message);
          }
      }
  });
 }

});
</script>
