// const data = {
//     userId: $('#userId').val(),
//     roleId: $('#roleId').val()
// };
// var userId = null; //for updation
// var details = {};


const showinvoicetable = invoiceList => {
    $('#Invoicetbl').dataTable().fnDestroy();
    $('.InvoicetblData').empty();
    var tblData = '';
    for (let k of invoiceList.keys()) {
        let invoicecategory = invoiceList.get(k);
        // console.log(invoicecategory);
        tblData +="<tr>";
        tblData +="<td>"+invoicecategory.transactionId+"</td>";

        tblData +="<td>"+invoicecategory.custName+"</td>";
        // tblData +="<td>"+invoicecategory.emailId+"</td>";
        tblData +="<td>"+invoicecategory.contactNumber+"</td>";
        tblData +="<td>"+invoicecategory.invDate+"</td>";
        tblData +="<td>"+invoicecategory.rate+"</td>";
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editinvoice(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="downloadPdf(' + (k) + ')"><i class="ik ik-edit"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.InvoicetblData').html(tblData);
    $('#Invoicetbl').dataTable({
        searching: true,
        retrieve: true,
        paging: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}

var invoiceList = new Map(); // category Map

const invoiceListFun = () => {
    $.ajax({
        url: url + 'getallinvtabledata.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
           // console.log(response);
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    invoiceList.set(response.Data[i].transactionId, response.Data[i]);
                }
                showinvoicetable(invoiceList);
            }
        }
    });
}
invoiceListFun();
function downloadPdf(tid){
    var link = url+'print-reciept.php?transactionId='+tid;
    window.open(link,'_blank');
}