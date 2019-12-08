var loadTaxs = () => {
    $.ajax({
        url: url + 'getAllTaxes.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            var dropdownList = '';
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    dropdownList += "<option value="+response.Data[i].TaxId+">"+response.Data[i].TaxId+"</option>";
                }
            }
            $('#TaxId').html(dropdownList);
        }
    });
}
loadTaxs();

var loadcategoryList = () => {
    $.ajax({
        url: url + 'getAllCategory.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            var dropdownList = '';
            if (response.Responsecode == 200) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    dropdownList += "<option value="+response.Data[i].categoryId+">"+response.Data[i].category+"</option>";
                }
            }
            $('#categoryId').html(dropdownList);
        }
    });
}
loadcategoryList();

var loadUnits = () => {
      $.ajax({
          url: url + 'getAllUnits.php',
          type: 'POST',
          dataType: 'json',
          success: function(response) {
            var dropdownList = '';
            if (response.Responsecode == 200) {
                  const count = response.Data.length;
                  for (var i = 0; i < count; i++) {
                    dropdownList += "<option value="+response.Data[i].unitId+">"+response.Data[i].unit+"</option>";
                  }
              }
              $('#unitId').html(dropdownList);
          }
      });
  }
  loadUnits();