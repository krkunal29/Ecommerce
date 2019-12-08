var unitList = new Map();
const loadUnits = () => {
  // console.log("Add Unit");
    $.ajax({
        url: url + 'getAllUnits.php',
        type: 'POST',
        dataType: 'json',
        // data: data,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    unitList.set(response.Data[i].unitId, response.Data[i]);
                }
                showUnits(unitList);
            }
        }
    });
}
loadUnits();
