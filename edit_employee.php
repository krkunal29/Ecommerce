<style>
    .error {
        color: red;
    }
</style>
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="img/user.jpg" id="previmg1" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-10" id="uexe"></h4>
                                            <p class="card-subtitle">Executive</p>
                                           
                </div>
            </div>
            <hr class="mb-0">
            <div class="card-body">
                <small class="text-muted d-block">Email address </small>
                <h6 id="userE"><span id="spanemail"></span></h6>
                <small class="text-muted d-block pt-10">Phone</small>
                <h6 id="userP"><span id="spanphone"></span></h6>
                <small class="text-muted d-block pt-10">Address</small>
                <h6 id="userA"><span id="spanaddress"></span></h6>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#userdetail" role="tab" aria-controls="pills-setting" aria-selected="false">User Details</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#invoicedetail" role="tab" aria-controls="pills-profile" aria-selected="false">Invoice Orders</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#walletdetail" role="tab" aria-controls="pills-timeline" aria-selected="true">Wallet Master</a>
                </li> -->

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="walletdetail" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                        <table class="table" id="walletdetailtbluser">
                            <thead>
                                <tr>

                                    <th>Wallet Tile</th>
                                    <th>Invoice Amount</th>
                                    <th>Total Amount</th>

                                </tr>
                            </thead>
                            <tbody class="walletdetailuserData">
                                <tr>

                                    <td>Invoice Tile</td>
                                    <td>Invoice Tile</td>
                                    <td>Invoice Tile</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="invoicedetail" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <table class="table" id="invoicetbluser">
                            <thead>
                                <tr>

                                    <th>Invoice Number</th>
                                    <th>Date</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody class="invoicetbluserData">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="userdetail" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        <form class="form-horizontal" id="customerform" method="POST">

                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" name="userId" id="usercusId" />
                                    <input type="hidden" name="roleId" value="3" />
                                </div>
                                <div class="col-md-4" style="text-align: center;" style="display:none;">
                                    <div class="form-group">
                                        <img id="prevImage" name="prevImage" src="" style="display:none;" class="img-circle" alt="No Image" width="100" height="100" />
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" placeholder="Enter First Name" class="form-control" name="fname" id="fname">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mname">Middle Name</label>
                                        <input type="text" placeholder="Enter Middle Name" class="form-control" name="mname" id="mname">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" placeholder="Enter Last Name" class="form-control" name="lname" id="lname">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <input type="email" placeholder="Enter Email" class="form-control" id="emailaddress" name="emailId">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="userphone">Phone No</label>
                                        <input type="text" placeholder="Enter Mobileno" id="cnumber" name="contactNumber" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" placeholder="125689" class="form-control" name="pincode" id="pincode">
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
                           
                            <div class="form-group">
                                <label for="userAddressFirst">Contact Address </label>
                                <textarea id="customeraddress" placeholder="Enter Customer Address" name="contactAddress" rows="2" class="form-control"></textarea>
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
                            <button class="btn btn-success" type="submit">Update Profile</button>
                            <button class="btn btn-light" type="button" onclick="goback()">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="js/jquery.validate.js"></script>
<script src="jscode/loadFile.js"></script>
<script src="jscode/user_validation.js"></script>
<script>

    function loadcusDetails(customer) {
        // console.log(customer);
        $("#usercusId").val(userIdu);
        $("#spanemail").html(customer.emailId);
        $("#spanphone").html(customer.contactNumber);
        $("#spanaddress").html(customer.contactAddress);
        $("#userTypeId").val(customer.roleId).trigger('change');
        $('#uexe').html(customer.fname+' '+customer.lname);
        $("#fname").val(customer.fname);
        $("#mname").val(customer.mname);
        $("#lname").val(customer.lname);
        $("#city").val(customer.city);
        $("#state").val(customer.state);
        $("#country").val(customer.country);
        $("#Tehsil").val(customer.tehsil);
        $("#Peek").val(customer.peek);
        $("#Hector").val(customer.hectre);
        $("#water" + customer.water).prop('checked', true);
        $("#cnumber").val(customer.contactNumber);
        $("#emailaddress").val(customer.emailId);
        $("#pincode").val(customer.pincode);
        $("#customeraddress").val(customer.contactAddress);
        $("#password").val(customer.upassword);
        var src = url + "user/" + userIdu + ".jpg";
        $('#prevImage').attr("src", src);
        $('#previmg1').attr("src", src);
    }
    loadcusDetails(details);

</script>
<script src="jscode/fetchCustomerInvoice.js"></script>
<script src="savecode/edit_customer.js" charset="utf-8"></script>