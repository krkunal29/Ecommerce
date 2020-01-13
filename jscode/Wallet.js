var loadWallet = () => {
    $('#walletTable').dataTable().fnDestroy();
    $('.walletData').empty();
    $.ajax({
        url: url + 'getWalletTransaction.php',
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
                    $('#wBalance').html(response.Data[0].wallet_amount);
                    var type=null;
                    if(response.Data[i].t_type == 'C'){
                    type = "Credited";
                    }else{
                        type = "Debited";
                    }
                    tblData += '<tr><td>' + response.Data[i].tid + '</td>';
                    tblData += '<td>' + type + '</td>';
                    tblData += '<td>' + response.Data[i].amount + '</td>';
                    tblData += '<td>' + response.Data[i].t_desc + '</td><td>';
                    tblData += response.Data[i].createdAt + '</td></tr>';
                }
            }
            $('.walletData').html(tblData);
            $('#walletTable').dataTable({
                searching: true,
                retrieve: true,
                paging: true,
                bPaginate: $('tbody tr').length > 10,
                order: [],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3, 4]
                }],
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf'],
                destroy: true
            });
        }

    });
}
loadWallet();