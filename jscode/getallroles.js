var roleList = new Map(); // category Map

const roleListData = () => {
    $.ajax({
        url: url + 'getAllRoles.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    roleList.set(response.Data[i].roleId, response.Data[i]);
                }
            
            }
        }
    });
}
roleListData();
