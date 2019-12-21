var categoryList = new Map();
const loadcategoryList = () => {
    $.ajax({
        url: url + 'getAllCategory.php',
        type: 'POST',
        dataType: 'json',
        // data: data,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    categoryList.set(response.Data[i].categoryId, response.Data[i]);
                }
                // showcategory(categoryList);
            }
        }
    });
}
loadcategoryList();
