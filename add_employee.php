<style>
.error{
    color: red;
}
</style>
<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add New Employee</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="customerform" method="POST">
                <div class="row">
<input type="hidden" name="roleId" value="3">
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
                            <label for="productDesc">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Country</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
                        </div>
                    </div>

                </div>
                <div class="row">
                <div class="col-md-4">
                      <div class="form-group">
                          <label for="productDesc">Contact Address</label>
                          <textarea class="form-control" id="customeraddress" placeholder="Enter Customer Address" name="contactAddress" rows="2"></textarea>
                      </div>
                  </div>
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
<script src="jscode/user_validation.js"></script>
<script src="jscode/loadFile.js"></script>
<script src="savecode/addcustomer.js"></script>
