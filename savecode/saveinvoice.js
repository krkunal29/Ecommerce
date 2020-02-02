var uinvoiceId = null; //for updation
var details = {};

var TableData;

function saveorder(){
  // console.log("ok");
  var loginId = data.userId;
  // console.log("sessionId"+loginId);
  var customerName=$("#customerName").val(); // Customer Id
  var customeremail=$("#customeremail").val();
  var cutomeraddress=$("#cutomeraddress").val();
  var orderremark=$("#orderremark").val();
  var invoiceDate=moment($("#dropper-default").val()).format('YYYY-MM-DD');
  var totaldiscount = $("#totaldiscount").val();
  var finalamtinvoice = $("#finalamtinvoice").val();
  TableData = storeTblValues();
  var walletid = $("#walletId").val();
  var walletbal = $("#walletbalance").val();
  if(walletid=="1"){

  }
  else{
    walletbal =0;
  }
  var postdata = {
    t_type:'Invoice',
    userId:loginId,
    customerId:customerName,
    products:TableData,
    customeremail:customeremail,
    discount:totaldiscount,
    remark:orderremark,
    invDate:invoiceDate,
    totalcost:finalamtinvoice
  };
  postdata = JSON.stringify(postdata);
  // console.log(postdata);
  $.ajax({
  url: url + 'addInvoice.php',
  type: 'POST',
  data:{postdata:postdata,walletbalance:walletbal},
  dataType: 'json',
  success: function(response) {
  // console.log(response);
  if (response.Responsecode == 200) {
          swal(response.Message);
          invoiceList.set(response.Data.transactionId, response.Data);
          // goback();
          $('#newinvoice').empty();
          $('.invoicelist').show();
          showinvoicetable(invoiceList);
       }
      else
       {
          swal(response.Message);
       }
  }
  });
}

function storeTblValues() {
  TableData = new Array();
  $('#invoicebody tr').each(function(row, tr) {
  var productId = $(tr).find('td:eq(0) select').val();
  var productHSN = $(tr).find('td:eq(1) input').val();
  var TaxId = $(tr).find('td:eq(2) select').val();
  var Qty = $(tr).find('td:eq(3) input').val();
  var Rate = $(tr).find('td:eq(4) input').val();
  var Total = $(tr).find('td:eq(5) input').val();
  if(productId==''||TaxId==''||Qty==''||Rate==''||Total==''||Total=="NaN"){
    swal('Please Add Requred Field ');
    TableData =[];
  }
  else{
    TableData[row] = {
        "productId":productId,
        "description": productHSN,
        "taxid":TaxId,
        "quantity": Qty,
        "rate": Rate

    }
  }
    });

    return TableData;
}
