var taxList = new Map();
const loadTaxs = () => {
    $.ajax({
        url: url + 'getAllTaxes.php',
        type: 'POST',
        dataType: 'json',
        // data: data,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    taxList.set(response.Data[i].TaxId, response.Data[i]);
                }
                showTaxs(taxList);
            }
        }
    });
}
loadTaxs();
