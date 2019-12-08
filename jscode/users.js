const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
var userId = null; //for updation
var details = {};
var userList = new Map();
const loadUsers = () => {
    $.ajax({
        url: url + 'getAllusers.php',
        type: 'POST',
        dataType: 'json',
        data: data,
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
        console.log(users);
        // var bdate = moment(users.birthDate).format("dddd, MMMM Do YYYY");
        tblData += '<tr><td><div class="d-inline-block align-middle"></td>';
        tblData += '<img src="img/users/4.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">';
        tblData += '<div class="d-inline-block"> <h6>Shirley  Hoe</h6>';
        tblData += '<p class="text-muted mb-0">Sales executive , NY</p>  </div></div></td>';
        tblData += '<td>Pinterest</td>';
        tblData += '<td>223</td>';
        tblData += '<td>19-11-2018</td> <label class="badge badge-primary">Sketch</label>';
        tblData += '<label class="badge badge-primary">Ui</label></td>';
        tblData += '<td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>';
        tblData += '</tr>';
    }
    console.log(tblData);
    $('.usersData').html(tblData);
    $('#users').dataTable({
        searching: true,
        retrieve: true,
        paging: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        // columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}
loadUsers();

const editVendor = vendorId => {
    vendorId = vendorId.toString();
    if (vendorsList.has(vendorId)) {
        $('.vendorlist').hide();
        $('#newvendor').load('edit_vendor.php');
        const vendor = vendorsList.get(vendorId);
        userId = vendorId;
        details = vendor;
    } else {
        alert('something goes wrong');
    }
}

const removeVendor = vendorId => {
    vendorId = vendorId.toString();
    if (vendorsList.has(vendorId)) {
        $('.vendorlist').hide();
        $('#newvendor').load('add_vendor.php');
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