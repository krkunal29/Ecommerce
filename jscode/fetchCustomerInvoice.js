var loadInvoice = () => {
    $('#invoicetbluser').dataTable().fnDestroy();
    $('.invoicetbluserData').empty();
    $.ajax({
        url: url + 'getAllCustomerInvoice.php',
        type: 'POST',
        data: {
            userId: userIdu
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            var tblData = '';
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    tblData += '<tr><td>' + response.Data[i].transactionId + '</td>';
                    tblData += '<td>' + response.Data[i].t_type + '</td>';
                    tblData += '<td>' + response.Data[i].invDate + '</td>';
                    tblData += '<td>' + response.Data[i].discount + '</td><td>';
                    tblData += response.Data[i].total + '</td>';
                    tblData += '<td><a href="#" onclick="checkInvoice(' + (response.Data[i].transactionId) + ')"><i class="ik ik-edit f-16 mr-15 text-green"></i></a></td>';
                    tblData += '</tr>';
                }
            }
            $('.invoicetbluserData').html(tblData);
            $('#invoicetbluser').dataTable({
                searching: true,
                retrieve: true,
                paging: true,
                bPaginate: $('tbody tr').length > 10,
                order: [],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3, 4, 5]
                }],
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf'],
                destroy: true
            });
        }

    });
}
loadInvoice();

function checkInvoice(tId) {
    console.log(tId);
}