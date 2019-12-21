
$('#productform').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#productform").valid();
    if (returnVal) {
        $.ajax({
            url: url + 'addProduct.php',
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
                        button: false,
                        timer: 1500
                    });
                    productList.set(response.Data.productId, response.Data);
                    showProducts(productList);
                    goback();
                } else {
                    swal({
                        position: 'top-end',
                        icon: 'warning',
                        title: response.Message,
                        button: false,
                        timer: 1500
                    });
                }
            }
        });
    }
});
