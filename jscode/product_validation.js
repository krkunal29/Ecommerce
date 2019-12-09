$(function() {
    $("#productform").validate( {
        ignore: [], rules: {
            productName: {
                required: true, minlength: 1, maxlength: 50
            }
            , unitId: {
                required: true
            }
            , description: {
                required: true
            },
            salePrice:{
                required: true, number: true
            },
            Quantity: {
                required: true, number: true
            },
            hsn:{
                minlength: 6, maxlength: 6
            },
            displayPrice:{
                number:true
            }
        }
        , messages: {
            productName: {
                required: "Please enter  product name", minlength: "Enter a product", maxlength: "Length Exceed 50 characters"
            }
            , unitId: {
                required: "Please select unit from list"
            }
            , description: {
                required: "Please enter product description"
            },
            salePrice:{
                required: "Please Enter a product sale price", number: "Enter only digits"
            }, 
            Quantity:{
                required: "Please Enter a product Quantity for", number: "Enter only digits"
            },
            hsn:{
                minlength: "HSN is six digit code", maxlength: "Number should not exceed six digit"
            },
            displayPrice:{
                number:"Enter only Digits"
            }
        }
    }
    );
}

);