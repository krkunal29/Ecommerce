function showReport() {
    $('#reportTable').dataTable().fnDestroy();
    $('.reportData').empty();
    var data = {
        fromDate: $('#fromDate').val(),
        uptoDate: $('#uptoDate').val(),
        userId:$('#userId').val()
    };
    $.ajax({
        url: url + 'getAllReports.php',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(response) {
            var tblData = '';
            var total = 0,
            inTotal = 0,
            amount = 0;
            if (response.Data != null) {
                var count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    var slideStatus ='-';
                    if(response.Data[i].isReturn==1){
                        slideStatus ='<span class="badge badge-danger">Returned</span>';
                    }else{
                        total = parseFloat(response.Data[i].amount) - parseFloat(response.Data[i].discount);
                        inTotal += parseFloat(response.Data[i].amount) - parseFloat(response.Data[i].discount);
                        amount += parseFloat(response.Data[i].amount);
                    }
                    tblData += '<tr><td>' + response.Data[i].transactionId + '</td>';
                    tblData += '<td>' + response.Data[i].invDate + '</td>';
                    tblData += '<td>' + response.Data[i].c_name + '</td>';
                    tblData += '<td>' + parseFloat(response.Data[i].amount).toFixed(2).toLocaleString('en-IN') + '</td>';
                    tblData += '<td>' + parseFloat(response.Data[i].discount).toFixed(2).toLocaleString('en-IN') + '</td>';
                    tblData += '<td>' + parseFloat(total).toFixed(2).toLocaleString('en-IN') + '</td>';
                    tblData += '<td>'+slideStatus+'</td>';
                    tblData += '<td>' + response.Data[i].fname +' ' + response.Data[i].lname +  '</td></tr>';
                }
            }
            $('.customerlist').show();
            $('#amtTotal').html((inTotal).toFixed(2).toLocaleString('en-IN'));
            $('#invTotol').html((amount).toFixed(2).toLocaleString('en-IN'));
            $('.reportData').html(tblData);
            $('#reportTable').DataTable({
                searching: true,
                retrieve: true,
                paging: true,
                bPaginate: $('tbody tr').length > 10,
                order: [],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1, 2, 3, 4, 5, 6]
                }],
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf'],
                destroy: true
            });
        }

    });

}