var subinnerCategoryList = new Map();
const loadsubinnerCategoryList = () => {
    $.ajax({
        url: url + 'getAllSubinnerCategory.php',
        type: 'POST',
        dataType: 'json',
        // data: data,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    subinnerCategoryList.set(response.Data[i].innersubcategoryId, response.Data[i]);
                }
                showinnerCategory(subinnerCategoryList);
            }
        }
    });
}
loadsubinnerCategoryList();
