const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
var userIdu = null; //for updation
var details = {};
var userList = new Map();
const loadUsers = () => {
    $.ajax({
        url: url + 'getAllusers.php',
        type: 'POST',
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

const showUsers = userList => {
    $('#users').dataTable().fnDestroy();
    $('.usersData').empty();
    var tblData = '';
    for (let k of userList.keys()) {
        let users = userList.get(k);
        // var bdate = moment(users.birthDate).format("dddd, MMMM Do YYYY");
        tblData += '<tr><td><div class="d-inline-block align-middle">';
        tblData += '<img src="img/users/4.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">';
        tblData += '<div class="d-inline-block"> <h6>'+users.fname+' '+users.lname+'</h6>';
        tblData += '<p class="text-muted mb-0">'+users.role+'</p>  </div></div></td>';
        tblData += '<td>'+users.contactNumber+'</td>';
        tblData += '<td>'+users.emailId+'</td>';
        tblData += '<td>'+users.contactAddress+'</td><td> <label class="badge badge-primary">active</label>';
        tblData += '</td>';
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
loadUsers();

const editUsers = userId => {
    console.log(userId);
    userId = vendorId.toString();
    if (userList.has(userId)) {
        $('.vendorlist').hide();
        $('#newvendor').load('edit_vendor.php');
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
        var userId = userList.get(userId);
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
                                    userList.delete(userId);
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

function addVendor() {
    $('.vendorlist').hide();
    $('#newvendor').load('add_vendor.php');
}

function goback() {
    $('#newvendor').empty();
    $('.vendorlist').show();
}