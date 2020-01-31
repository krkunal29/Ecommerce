var userList = new Map();
const customerUsers = () => {
    $.ajax({
        url: url + 'getcustomerforinv.php',
        type: 'POST',
        dataType: 'json',

        success: function(response) {
            // console.log(response);
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    userList.set(response.Data[i].customerId, response.Data[i]);
                }

            }
        }
    });
}
customerUsers();
