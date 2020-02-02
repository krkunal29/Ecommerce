var userIdu = null; //for updation
var details = {};
var userList = new Map();
var loadUsers = (roleId) => {
    $.ajax({
        url: url + 'getAllusers.php',
        type: 'POST',
        data:{roleId:roleId},
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    userList.set(response.Data[i].userId, response.Data[i]);
                }
            showUsers(userList);
            }
        }
    });
}

var showUsers = userList => {
    $('#users').dataTable().fnDestroy();
    $('.usersData').empty();
    var tblData = '';
    for (let k of userList.keys()) {
        let users = userList.get(k);
        var label = null;
        if(users.isActive == '1' || users.isActive == 1){
        label = '<td> <label class="badge badge-primary">active</label></td>';
        }else{
            label = '<td> <label class="badge badge-danger">inactive</label></td>';
        }
        tblData += '<tr><td><img src="' + url + 'user/' + users.userId + '.jpg" class="table-user-thumb" alt="Image"></td>';
        tblData += '<td>'+users.fname+' '+users.lname+'</td>';
        tblData += '<td>'+users.contactNumber+'</td>';
        tblData += '<td>'+users.emailId+'</td>';
        tblData += '<td>'+users.contactAddress+'</td>';
        tblData += label;
        tblData += '<td><a href="#" onclick="editUsers('+(k)+')"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!" onclick="removeUser('+(k)+')"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>';
        tblData += '</tr>';
    }

    $('.usersData').html(tblData);
    $('#users').dataTable({
        searching: true,
        retrieve: true,
        paging: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}


var editUsers = userId => {
    $('#newcustomer').empty();
    userId = userId.toString();
    if (userList.has(userId)) {
        $('.customerlist').hide();
        $('#newcustomer').load('edit_employee.php');
        const user = userList.get(userId);
        userIdu = userId;
        details = user;
    } else {
        alert('something goes wrong');
    }
}

var removeUser = userId => {
    userId = userId.toString();
    if (userList.has(userId)) {
        var user = userList.get(userId);
        var listDelete = $('.list-delete');
            swal({
                    title: "Are you sure?",
                    text: "Do you really want to Inactive this user ?",
                    icon: "warning",
                    buttons: ["Cancel", "Inactive Now"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url + 'inactiveUser.php',
                            type: 'POST',
                            data: { userId: userId },
                            dataType: 'json',
                            success: function(response) {
                                if (response.Responsecode == 200) {
                                    if (user.isActive == '0') {
                                        user.isActive = '1';
                                    } else {
                                        user.isActive = '0';
                                    }
                                    userList.set(userId, user);
                                    showUsers(userList);
                                    swal({
                                        title: "In active",
                                        text: response.Message,
                                        icon: "success",
                                    });

                                }
                            }
                        })
                    } else {
                        swal("User Not In Activated!");
                    }
                });

    }
}

function addCustomer() {
    $('#newcustomer').empty();
    $('.customerlist').hide();
    $('#newcustomer').load('add_employee.php');
}

function goback() {
    $('#newcustomer').empty();
    $('.customerlist').show();
}
