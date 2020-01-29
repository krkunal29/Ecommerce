$(function() {
    $("#customerform").validate( {
        ignore: [], rules: {
            custName: {
                required: true, minlength: 2, maxlength: 100
            }
            ,
            contactNumber:{
                required: true, number: true,minlength: 10, maxlength: 10
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            pincode:{
                required: true,minlength: 6, maxlength: 6
            },
            customeraddress:{
                  required: true
            }
        }
        , messages: {
            custName: {
                required: "Please enter  Customer name", minlength: "Enter full name of a Customer", maxlength: "Length Exceed 50 characters"
            }
            ,
            contactNumber:{
                required: "Please Enter a Customer Mobile No", number: "Enter only digits",minlength:'10 Digit number only',maxlength:'can not exceed 10 digit'
            },
            city: {
                required: "Please Enter a City"
            },
            state: {
                required: "Please Enter a State"
            },
            pincode:{
                required: "Please Enter a Pincode", minlength: "Pincode is six digit code", maxlength: "Number should not exceed six digit"
            },
            customeraddress:{
                  required: "Please Enter a Address"
            }
        }
    }
    );
}

);
