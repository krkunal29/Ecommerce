$(function() {
    $("#customerform").validate( {
        ignore: [], rules: {
            fname: {
                required: true, minlength: 1, maxlength: 50
            },
            lname: {
                required: true, minlength: 1, maxlength: 50
            }
            ,
            contactNumber:{
                required: true, number: true,minlength: 10, maxlength: 10
            },
            emailId: {
                required: true
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            country: {
                required: true
            },
            pincode:{
                minlength: 6, maxlength: 6
            },
            contactAddress:{
                  required: true
            }
            ,
            upassword:{
                  required: true
            }
        }
        , messages: {
            fname: {
                required: "Please enter  Customer name", minlength: "Enter a Customer", maxlength: "Length Exceed 50 characters"
            },
            lname: {
                required: "Please enter  Customer name", minlength: "Enter a Customer", maxlength: "Length Exceed 50 characters"
            }
            ,
            contactNumber:{
                required: "Please Enter a Customer Mobile No", number: "Enter only digits"
            },
            emailId:{
                required: "Please Enter a Valid Email Address"
            },
            city: {
                required: "Please Enter a City"
            },
            state: {
                required: "Please Enter a State"
            },
            country: {
                required: "Please Enter a Country"
            },
            pincode:{
                minlength: "Pincode is six digit code", maxlength: "Number should not exceed six digit"
            },
            contactAddress:{
                  required: "Please Enter a Address"
            }
            ,
            upassword:{
                required: "Please Enter a Password"
            }
        }
    }
    );
}

);
