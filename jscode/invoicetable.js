
const showinvoicetable = invoiceList => {
    $('#Invoicetbl').dataTable().fnDestroy();
    $('.InvoicetblData').empty();
    var tblData = '';
    for (let k of invoiceList.keys()) {
        let invoicecategory = invoiceList.get(k);
        var slideStatus ='-';
        if(invoicecategory.isReturn==1){
            slideStatus ='<span class="badge badge-danger">Returned</span>';
        }
        tblData +="<tr>";
        tblData +="<td style='width:5%;'>"+invoicecategory.transactionId+"</td>";
        tblData +="<td>"+invoicecategory.custName+"</td>";
        tblData +="<td>"+invoicecategory.contactNumber+"</td>";
        tblData +="<td>"+invoicecategory.invDate+"</td>";
        tblData +="<td>"+invoicecategory.rate1+"</td>";
        tblData +="<td>"+slideStatus+"</td>";
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editinvoice(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#"  onclick="downloadPdf(' + (k) + ')"><i class="ik ik-edit"></i></a>';
        tblData += '<a href="#"  onclick="returnOrder(' + (k) + ')"><i class="ik ik-trash"></i></a>';
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
var returnOrder = sliderId => {
    sliderId = sliderId.toString();
    if (invoiceList.has(sliderId)) {
        let invoice = invoiceList.get(sliderId);
          swal({
                  title: "Are you sure?",
                  text: "are you really want to return this order",
                  icon: "warning",
                  buttons: ["Cancel", 'Return Now'],
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
    $.ajax({
        url:url+'returnInvoice.php',
        type:'POST',
        data:{
            invoiceId:sliderId
        },
        dataType:'json',
        success:function(response){
          if(response.Responsecode==200){
            swal({
                title: "Return Order",
                text: response.Message,
                icon: "success",
            });
          }
          else{
              swal("No Action");
          }
        }
    });
  } else {
    swal("The Order is not return!");
}
});
}
}