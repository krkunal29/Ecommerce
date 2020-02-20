const loadDetails = () => {
    $.ajax({
        url: url + 'getPdfDetails.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.Data != null) {
               $('#firm').val(response.Data.firm);
               $('#contactNumber').val(response.Data.contactnumber);
               $('#acontactNumber').val(response.Data.acontactnumber);
               $('#dAddress').val(response.Data.dAddress);
               $('#gstn').val(response.Data.gstn);
            }
        }
    });
}
loadDetails();
