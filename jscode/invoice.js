
var TableData;
function saveorder(){
  var customerName=$("#customerName").val();
  // console.log(customerName);
  var customeremail=$("#customeremail").val();
  // console.log(customeremail);
  var cutomeraddress=$("#cutomeraddress").val();
  // console.log(cutomeraddress);
  var orderremark=$("#orderremark").val();
  // console.log(orderremark);
  var invoiceDate=$("#invoiceDate").val();
  // console.log(invoiceDate);
  TableData = storeTblValues();
// TableData = JSON.stringify(TableData);
  // console.log(TableData);
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
  // console.log(postdata);
  $.ajax({
  url: url + 'addInvoice.php',
  type: 'POST',
  data:{postdata:postdata},
  dataType: 'json',
  success: function(response) {
  console.log(response);
  // if (response.Responsecode == 200) {
  //         blogList.set(response.Data[0].blogId,response.Data[0]);
  //         showblog(blogList);
  //         goback();
  //     } else {
  //         alert(response.Message);
  // }
  }
  });
}

function storeTblValues() {
   TableData = new Array();

    $('#invoicebody tr').each(function(row, tr) {
        var productId = $(tr).find('td:eq(0) select').val();
        // console.log(productId);
        var productHSN = $(tr).find('td:eq(1) input').val();
          // console.log(productHSN);
        var TaxId = $(tr).find('td:eq(2) select').val();
          // console.log(TaxId);
        var Qty = $(tr).find('td:eq(3) input').val();
  // console.log(Qty);
        var Rate = $(tr).find('td:eq(4) input').val();
  // console.log(Rate);
        var Total = $(tr).find('td:eq(5) input').val();
  // console.log(Total);
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
// function goback() {
//     $('#newinvoice').empty();
//     $('.invoicelist').show();
// }
