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
                    <p class="card-subtitle">Customer</p>

                </div>
            </div>
            <hr class="mb-0">
            <div class="card-body">
                <small class="text-muted d-block pt-10">Phone</small>
                <h6 id="userP"><span id="spanphone"></span></h6>
                <small class="text-muted d-block pt-10">Address</small>
                <h6 id="userA"><span id="spanaddress"></span></h6>
                <small class="text-muted d-block pt-10">Refferal Code</small>
                <h6 id="urefferCode"></h6>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">

            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#userdetail" role="tab" aria-controls="pills-setting" aria-selected="false">User Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#invoicedetail" role="tab" aria-controls="pills-profile" aria-selected="false">Orders</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#walletdetail" role="tab" aria-controls="pills-timeline" aria-selected="true">Wallet</a>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="walletdetail" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                    <div class="row">
                                                    <div class="col-md-3 col-6"> <strong>Wallet Balance</strong>

                                                    </div>
                                                    <div class="col-md-3 col-6" > <strong id="wBalance">0.00 Rs</strong>

                                                    </div>



                                                </div>
                                                <hr>
                        <table class="table" id="walletTable">
                            <thead>
                                <tr>

                                    <th>TransactionId</th>
                                    <th>Transaction</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Date</th>

                                </tr>
                            </thead>
                            <tbody class="walletData">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="invoicedetail" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <table class="table" id="invoicetbluser">
                            <thead>
                                <tr>

                                    <th>Transaction Number</th>
                                    <th>Type</th>
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
                    <form class="forms-sample" id="customerform" method="POST">
                <input type="hidden" name="roleId" value="2" id="roleId" />
                <input type="hidden" id="usercusId" name="userId">
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Customer Name</label>
                            <input type="text" class="form-control" id="custName" name="custName" placeholder="Enter Full Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Contact Number</label>
                            <input type="text" class="form-control" id="cnumber" name="contactNumber" placeholder="Enter Contact Number">
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
        <label for="cnumber1">Alternate contact number </label>
        <input type="text" class="form-control" id="cnumber1" name="alternateContact" placeholder="Enter Contact number">
    </div>
                    </div>

                </div>
                <div class="row">

<div class="col-md-4">
    <div class="form-group">
        <label for="cnumber2">Alternate second Contact Number</label>
        <input type="text" class="form-control" id="cnumber2" name="alternateContact1" placeholder="Enter Alternate Contact Number">
    </div>
</div>
<div class="col-md-8">
<div class="form-group">
        <label for="peek">Peek</label>
        <input type="text" class="form-control" id="peek" name="peek">
    </div>
</div>


</div>
                <div class="row">


<div class="col-md-4">
    <div class="form-group">
        <label for="state">State</label>
        <select name="custState" id="state" style="width:100%;" class="form-control" onchange="loadCities(this.value)"></select>
        <!-- <input type="text" class="form-control" id="state" name="state" placeholder="Enter State"> -->
    </div>
</div>
<div class="col-md-4">
<div class="form-group">
        <label for="city">City</label>
        <select name="custCity" id="city" style="width:100%;" class="form-control"></select>
        <!-- <input type="text" class="form-control" id="city" name="city" placeholder="Enter City"> -->
    </div>

</div>
<div class="col-md-4">
<div class="form-group">
                            <label for="productDesc">Pincode</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode">
                        </div>
</div>

</div>


                <h5>Billing Address</h5>
                <hr>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="productDesc">Billing Address</label>
                            <textarea class="form-control" id="billingAddress" placeholder="Enter Customer Address" name="billingAddress" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="col-md-4" style="margin-top: 23px;">
                        <label for="productDesc">Water Status</label>
                        <div class="form-group">

                            <div class="radio-inline">

                                <input name="water" checked="checked" type="radio" value="1">
                                <i class="helper"></i>Available

                                <input name="water" type="radio" value="0">
                                <i class="helper"></i>UnAvailable

                            </div>

                        </div>
                    </div>

                </div>
                <h5>Shipping Address</h5>
                <input name="billAddress"  type="checkbox">
                                <i class="helper"></i>Same as Billing address
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="productDesc">Shipping Address</label>
                            <textarea class="form-control" id="shippingAddress" placeholder="Enter Customer Address" name="shippingAddress" rows="2"></textarea>
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
                <button type="submit" class="btn btn-primary mr-2">Update Details</button>
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
<script src="jscode/customer_validation.js"></script>
<script src="jscode/Wallet.js"></script>
<script>
 $('#peek').tagsinput({
        'autocomplete': {
            source: ['Hello','Hi','Peek','Us']
        }
    });

    $('input[type="checkbox"]').click(function(){

if($(this).prop("checked") == true){
var shp =  $('#billingAddress').val();
   $('#shippingAddress').val(shp);

}

else if($(this).prop("checked") == false){

    $('#shippingAddress').val('');

}

});
loadStates();

function loadStates() {
    var dropdownList = '<option></option>';
    for (let k of states.keys()) {
        var state = states.get(k);

            dropdownList += '<option value="' + state.id + '">' + state.name + '</option>';
    }
    $('#state').html(dropdownList);
    $("#state").select2({
        placeholder: 'Select State',
        allowClear: true
    });
}

function loadCities(stateId) {
    var dropdownList = '<option></option>';
    for (let k of cities.keys()) {
        var city = cities.get(k);
        if (city.state_id == stateId)
            dropdownList += '<option value="' + city.id + '">' + city.name + '</option>';
    }
    $('#city').html(dropdownList);
    $("#city").select2({
        placeholder: 'Select City',
        allowClear: true
        // dropdownParent: $('#fullwindowModal')
    });
}
</script>
<script>
    function loadcusDetails(customer) {
        $('#urefferCode').html(customer.refferalCode);
        $("#usercusId").val(userIdu);
        $("#spanphone").html(customer.contactNumber);
        $("#spanaddress").html(customer.billingAddress);
        $('#uexe').html(customer.custName);
        $("#custName").val(customer.custName);
        $("#state").val(customer.custState).trigger('change');


        $("#peek").importTags(customer.peek);
        $("#water" + customer.water).prop('checked', true);
        $("#cnumber").val(customer.contactNumber);
        $("#cnumber1").val(customer.alternateContact);
        $("#cnumber2").val(customer.alternateContact1);
        $("#city").val(customer.city).trigger('change');
        $("#pincode").val(customer.pincode);
        $("#shippingAddress").val(customer.shippingAddress);
        $("#billingAddress").val(customer.billingAddress);
        var src = url + "customer/" + userIdu + ".jpg";
        $('#prevImage').attr("src", src);
        $('#previmg1').attr("src", src);
    }
    loadcusDetails(details);
</script>
<script src="jscode/fetchCustomerInvoice.js"></script>
<script src="savecode/edit_customer.js" charset="utf-8"></script>
