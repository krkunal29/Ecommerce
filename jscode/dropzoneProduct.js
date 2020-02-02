Dropzone.autoDiscover = false;
$(".dropzone").dropzone({
    init: function() {
        thisDropzone = this;
        var link = url + 'getImages.php';
        $.get(link, {
            productId: details.productId
        }, function(response) {
            if(response.Data!=null){
              $.each(response.Data, function(key, value) {

                  var mockFile = {
                      name: value.name,
                      size: value.size
                  };
                  thisDropzone.emit("addedfile", mockFile);
                  thisDropzone.createThumbnailFromUrl(mockFile, "apis/upload/productImages/" + value.name);


              });
            }


        });
    },
    addRemoveLinks: true,
    removedfile: function(file) {
        var name = file.name;
        $.ajax({
            type: 'POST',
            url: url + 'uploadProduct.php',
            data: {
                name: name,
                request: 2,
                pic_productId: uproductId
            },
            sucess: function(data) {
                console.log('success: ' + data);
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
});
