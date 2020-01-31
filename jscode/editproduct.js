
function loadDetails(product) {
    
    $('#productId').val(product.productId);
    $('#productName').val(product.productName);
    $('#pic_productId').val(product.productId);
     $('#categoryId').val(product.categoryId).trigger('change');
    $('#salePrice').val(product.salePrice);
    $('#displayPrice').val(product.displayPrice);
    $('#Quantity').val(product.Quantity);
    $('#unitId').val(product.unitId).trigger('change');
    $('#hsn').val(product.HSN);
    $('#sku').val(product.SKU);
    $('#TaxId').val(product.TaxId).trigger('change');
    $('#description').val(product.description);
    $('#subcategoryId').val(product.subcategoryId).trigger('change');
    // setTimeout(function(){
      // swal("ok12");
      $('#innersubcategoryId').val(product.innersubcategoryId).trigger('change');
      $('#lastsubcategoryId').val(product.lastsubcategoryId).trigger('change');
$('#pexpiryDate').val(product.expiryDate);
    // }, 10000);

    var src = url + "upload/" + product.productId + ".jpg";
     // console.log(src);
    $('#prevImage').attr("src", src);
}
loadDetails(details);

$('#productform').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#productform").valid();
    // Get base64 value from <img id='imageprev'> source
    if (returnVal) {
        $.ajax({
            url: url + 'editProduct.php',
            type: 'POST',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.Responsecode == 200) {
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: response.Message,
                        Button: false,
                        timer: 1500
                    })
                    productList.set(response.Data.productId, response.Data);
                    showProducts(productList);
                    goback();
                } else {
                    swal({
                        position: 'top-end',
                        icon: 'warning',
                        title: response.Message,
                        Button: false,
                        timer: 1500
                    })
                }
            }
        });
    }
});
