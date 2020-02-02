const customerUsers = () => {
    $.ajax({
        url: url + 'getAllusers.php',
        type: 'POST',
        dataType: 'json',
        data: {
            roleId: 3 // For Executive
        },
        success: function(response) {
            var dropdownList = '<option></option>';
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    dropdownList += '<option value=' + response.Data[i].userId + '>' + response.Data[i].fname + ' ' + response.Data[i].lname + '</option>'
                }
                $('#userId').html(dropdownList);
                $('#userId').select2({
                    placeholder: 'Select Executive',
                    allowClear: true
                });
            }
        }
    });
}
customerUsers();