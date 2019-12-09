var blogcategoryList = new Map();
const loadBlogcategory = () => {
    $.ajax({
        url: url + 'getAllBlogCategory.php',
        type: 'POST',
        dataType: 'json',
        // data: data,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    blogcategoryList.set(response.Data[i].categoryId, response.Data[i]);
                }
                showblogcategory(blogcategoryList);
            }
        }
    });
}
loadBlogcategory();
