$(function() {
    $("#taxform").validate( {
        ignore: [], rules: {
          taxname: {
              required: true
          },
            tax: {
                required: true, number: true
            }
        }
        , messages: {
          taxname: {
              required: "Please enter Tax Name"
          },
            tax:{
                required: "Please Enter a TAX value for", number: "Enter only digits"
            }
        }
    }
    );
}

);
