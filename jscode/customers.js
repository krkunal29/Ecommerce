var userIdu = null; //for updation
var details = {};
var userList = new Map();
const loadUsers = (roleId) => {
    $.ajax({
        url: url + 'getCustomers.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    userList.set(response.Data[i].customerId, response.Data[i]);
                }
            showUsers(userList);
            }
        }
    });
}

const showUsers = userList => {
    $('#users').dataTable().fnDestroy();
    $('.usersData').empty();
    var tblData = '';
    for (let k of userList.keys()) {
        let users = userList.get(k);

        tblData += '<tr><td><img src="' + url + 'customer/' + users.customerId + '.jpg" class="table-user-thumb" alt="Image"></td>';
        tblData += '<td>'+users.custName+'</td>';
        tblData += '<td>'+users.contactNumber+'</td>';
        tblData += '<td>'+users.stateName+' '+users.custCity+'</td>';
        tblData += '<td>'+users.refferalCode+'</td>';
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


const editUsers = userId => {
    userId = userId.toString();
    if (userList.has(userId)) {
        $('.customerlist').hide();
        $('#newcustomer').load('edit_customer.php');
        const user = userList.get(userId);
        userIdu = userId;
        details = user;
    } else {
        alert('something goes wrong');
    }
}

const removeUser = userId => {
    userId = userId.toString();
    if (userList.has(userId)) {
        var user = userList.get(userId);
        var listDelete = $('.list-delete');
            swal({
                    title: "Are you sure?",
                    text: "Do you really want to remove this user ?",
                    icon: "warning",
                    buttons: ["Cancel", "Delete Now"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url + 'removeCustomer.php',
                            type: 'POST',
                            data: { userId: userId },
                            dataType: 'json',
                            success: function(response) {
                                if (response.Responsecode == 200) {

                                    userList.delete(userId);
                                    showUsers(userList);
                                    swal({
                                        title: "Removed Successfully",
                                        text: response.Message,
                                        icon: "success",
                                    });

                                }
                            }
                        })
                    } else {
                        swal("User is safe!");
                    }
                });

    }
}

function addCustomer() {
    $('#newcustomer').empty();
    $('.customerlist').hide();
    $('#newcustomer').load('add_customer1.php');
}

function goback() {
    $('#newcustomer').empty();
    $('.customerlist').show();
}
