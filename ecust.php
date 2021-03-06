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
