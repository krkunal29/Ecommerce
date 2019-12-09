var userList = new Map();
const customerUsers = () => {
    $.ajax({
        url: url + 'getAllusers.php',
        type: 'POST',
        dataType: 'json',
        data: {
          roleId:2 // For Customer
        },
        success: function(response) {

            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    userList.set(response.Data[i].userId, response.Data[i]);
                }

            }
        }
    });
}
customerUsers();
