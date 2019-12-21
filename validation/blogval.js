$(function() {
    $("#blogform").validate( {
        ignore: [], rules: {
          blogTitle: {
              required: true
          },
            categoryId: {
                required: true
            },
            blogContent: {
                required: true
            }
            // ,
            // blogUrl: {
            //     required: true
            // }
            ,
            blogStatus: {
                required: true
            }
        }
        , messages: {
          blogTitle: {
              required: "Please Enter Blog Title"
          },
            categoryId:{
                required: "Please Select Category"
            },
            blogContent: {
                  required: "Please Select Blog"
            }
            // ,
            // blogUrl: {
            // required: "Please Select Blog URL"
            // }
            ,
            blogStatus: {
                required: "Please Select Blog Status"
            }
        }
    }
    );
}

);
