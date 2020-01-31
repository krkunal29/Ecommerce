<style>
    .error {
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
                            <label for="productDesc">Customer Name</label>
                            <input type="text" class="form-control" id="custName" name="custName" placeholder="Enter First Name">
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
                <input name="billAddress"  type="checkbox" value="1">
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
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="button" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
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
    });
}
</script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/customer_validation.js"></script>
<script src="jscode/loadFile.js"></script>
<script src="savecode/addcustomer.js"></script>