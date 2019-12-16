<style>
.error{
    color: red;
}
</style>
<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Update Customer</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="customerform" method="POST">

                <input type="hidden" name="userId"  id="usercusId" />
                <!-- <input type="hidden" name="roleId" value="2" id="roleId" /> -->
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
                  <label for="productDesc">User Type</label>
                  <select class="form-control select2" id="userTypeId" name="roleId" onchange="changeuserId()">

                  </select>
                  </div>
                  </div>
                  <div class="col-md-4" id="showtehsil" style="display:none;">
                      <div class="form-group">
                          <label for="productDesc">Tehsil</label>
                          <!-- <input type="text" class="form-control" id="blogcontent" placeholder="Enter Blog Content"> -->
                          <input type="text" class="form-control" id="Tehsil" placeholder="Enter Customer Tehsil" name="tehsil" />
                      </div>
                  </div>
                  <div class="col-md-4"  id="showpeek" style="display:none;">
                      <div class="form-group">
                          <label for="productDesc">Peek</label>
                          <!-- <input type="text" class="form-control" id="blogcontent" placeholder="Enter Blog Content"> -->
                          <input type="text" class="form-control" id="Peek" placeholder="Enter Customer Peek" name="peek" />
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
                  <div class="col-md-4"  id="showhector" style="display:none;">
                      <div class="form-group">
                          <label for="productDesc">Hector</label>
                          <!-- <input type="text" class="form-control" id="blogcontent" placeholder="Enter Blog Content"> -->
                          <input type="number" class="form-control" id="Hector" placeholder="Enter Customer Hector" name="hectre" />
                      </div>
                  </div>
                  <div class="col-md-4"  id="showwaterstat" style="display:none;">
                    <label for="productDesc">Water Status</label>
                      <div class="form-group">

                          <div class="radio-inline">

                                <input name="water" checked="checked" type="radio" value="1" id="water1">
                                <i class="helper"></i>Available

                                <input name="water" type="radio" value="0" id="water0">
                                <i class="helper"></i>UnAvailable

                          </div>

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
function loadUserRoles()
{
// console.log(roleList);
var html = '<option value="">Select User Roles</option>';
for(let k of roleList.keys()){
  let rolename = roleList.get(k);
  html +='<option value='+rolename.roleId+'>'+rolename.role+'</option>';
}
$("#userTypeId").html(html);
}
$("#userTypeId").select2();
loadUserRoles();
function loadcusDetails(customer){
  // console.log(customer);
$("#usercusId").val(userIdu);
$("#userTypeId").val(customer.roleId).trigger('change');
$("#fname").val(customer.fname);
$("#mname").val(customer.mname);
$("#lname").val(customer.lname);
$("#Tehsil").val(customer.tehsil);
$("#Peek").val(customer.peek);
$("#Hector").val(customer.hectre);
// console.log("#water"+customer.water);
$("#water"+customer.water).prop('checked',true);


$("#cnumber").val(customer.contactNumber);
$("#emailaddress").val(customer.emailId);
$("#pincode").val(customer.pincode);
$("#customeraddress").val(customer.contactAddress);
$("#password").val(customer.upassword);
}
loadcusDetails(details);
function changeuserId(){
  var usertypeid = $("#userTypeId").val();
  // console.log(usertypeid);
  if(usertypeid==2){
          $("#showtehsil").show();
          $("#showpeek").show();
          $("#showhector").show();
          $("#showwaterstat").show();
  }
  else
  {
    $("#showtehsil").hide();
    $("#showpeek").hide();
    $("#showhector").hide();
    $("#showwaterstat").hide();
  }
}

$('#customerform').on('submit', function(e) {
  e.preventDefault();
  var returnVal = $("#customerform").valid();
  if (returnVal) {
      $.ajax({
      url: url + 'editUser.php',
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
