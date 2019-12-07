var blogcategoryList = new Map(); // category Map

const bloglistcategory = () => {
    $.ajax({
        url: url + 'getAllBlogCategory.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    blogcategoryList.set(response.Data[i].categoryId, response.Data[i]);
                }
                console.log(blogcategoryList);
            }
        }
    });
}
bloglistcategory();
