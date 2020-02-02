var sublastCategoryList = new Map();
const loadsublastCategoryList = () => {
    $.ajax({
        url: url + 'getAllSublastCategory.php',
        type: 'POST',
        dataType: 'json',
        // data: data,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    sublastCategoryList.set(response.Data[i].lastsubcategoryId, response.Data[i]);
                }
                showlastCategory(sublastCategoryList);
            }
        }
    });
}
loadsublastCategoryList();
