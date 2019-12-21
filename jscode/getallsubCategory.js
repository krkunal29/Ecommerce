var subCategoryList = new Map();
const loadsubcategoryList = () => {
    $.ajax({
        url: url + 'getAllSubCategory.php',
        type: 'POST',
        dataType: 'json',
        // data: data,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    subCategoryList.set(response.Data[i].subcategoryId, response.Data[i]);
                }
                showcategory(subCategoryList);
            }
        }
    });
}
loadsubcategoryList();
