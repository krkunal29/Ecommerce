var productList = new Map();
const loadProducts = () => {
    $.ajax({
        url: url + 'getAllProducts.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                     productList.set(response.Data[i].productId, response.Data[i]);
                }
               // showProducts(productList);
            }
        }
    });
}
loadProducts();
