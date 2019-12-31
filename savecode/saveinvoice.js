var uinvoiceId = null; //for updation
var details = {};

var TableData;
function saveorder(){
  // console.log("ok");
  var customerName=$("#customerName").val();
  var customeremail=$("#customeremail").val();
  var cutomeraddress=$("#cutomeraddress").val();
  var orderremark=$("#orderremark").val();
  var invoiceDate=$("#dropper-default").val();
  TableData = storeTblValues();
  var postdata = {
    t_type:'Invoice',
    userId:customerName,
    products:TableData,
    customeremail:customeremail,
    discount:'1',
    remark:orderremark,
    invDate:'2019/12/09'
  };
  postdata = JSON.stringify(postdata);
   console.log(postdata);
  $.ajax({
  url: url + 'addInvoice.php',
  type: 'POST',
  data:{postdata:postdata},
  dataType: 'json',
  success: function(response) {

  if (response.Responsecode == 200) {

          swal(response.Message);
          goback();
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
    swal('Please Add Required Field ');
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
