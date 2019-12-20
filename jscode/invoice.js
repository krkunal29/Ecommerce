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


const editinvoice = invoiceid => {
     loadUsers();
     $("#invoicebody").empty();
      $("#fullwindowModal").modal();  // uinvoiceId = invoiceid;
      $.ajax({
          url: url + 'getinvoicedata.php',
          type: 'POST',
          dataType: 'json',
          data :{
          transactionId:invoiceid
          },
          success: function(response) {
             console.log(response);
             if (response.Responsecode == 200) {
               // console.log(response.Responsecode);
               const count = response.Data.length;
               $("#customerName").val(response.Data[0].userId).trigger('change');
               $("#customeremail").val(response.Data[0].emailId);
               $("#cutomeraddress").val(response.Data[0].contactAddress);
               $("#orderremark").val(response.Data[0].remark);
               $("#dropper-default").val(response.Data[0].invDate);
               rowid =0;
               for(var i=0;i<count;i++){
                 rowid+=(i+1);
                 rowhtml="";
                 rowhtml+='<tr id="row'+rowid+'">';
                 rowhtml+='<td>';
                 rowhtml+='<select class="form-control" id="ProductId'+rowid+'" name="ProductId'+rowid+'" style="width:100%;" onchange="changeproduct(this.value,'+rowid+')">';
                 rowhtml+='</select>';
                 rowhtml+='</td>';
                 rowhtml+='<td>';
                 rowhtml+='  <input type="text" class="form-control" id="productHSN'+rowid+'" name="productHSN'+rowid+'" placeholder="HSN"/>';
                 rowhtml+='</td>';
                 rowhtml+='  <td>';
                 rowhtml+='  <select class="form-control" id="TaxId'+rowid+'" name="TaxId'+rowid+'"  style="width:100%;">';
                 rowhtml+='  </select>';
                 rowhtml+='    </td>';
                 rowhtml+='    <td>';
                 rowhtml+='      <input type="text" class="form-control" id="Qty'+rowid+'" name="Qty'+rowid+'" value="1" placeholder="Qty"  onchange="qtyratecalculator('+rowid+')" style="width:100%;"/>';
                 rowhtml+='    </td>';
                 rowhtml+='    <td>';
                 rowhtml+='      <input type="text" class="form-control" id="Rate'+rowid+'" name="Rate'+rowid+'" placeholder="Rate" onchange="qtyratecalculator('+rowid+')"/>';
                 rowhtml+='    </td>';
                 rowhtml+='    <td>';
                 rowhtml+='      <input type="text" class="form-control" id="Total'+rowid+'" name="Total'+rowid+'" placeholder="Total" readonly/>';
                 rowhtml+='    </td>';
                 rowhtml+='    <td>';
                 rowhtml+='       <button type="button" class="btn btn-icon btn-danger" onclick="deleterow('+rowid+')" ><i class="ik ik-trash"></i></button>';
                 rowhtml+='    </td>';
                 rowhtml+='</tr>';
                 $("#invoicebody").prepend(rowhtml);
                 loadtax(rowid);
                 loadproducts(rowid);
                 $("#ProductId"+rowid).select2();
                 $("#TaxId"+rowid).select2();
                 $("#ProductId"+rowid).val(response.Data[i].productId).trigger('change');
                 $("#productHSN"+rowid).val(response.Data[i].t_description);
                 $("#TaxId"+rowid).val(response.Data[i].taxId).trigger('change');
                 $("#Qty"+rowid).val(response.Data[i].Quantity);
                 $("#Rate"+rowid).val(response.Data[i].rate);
                 $("#Total"+rowid).val(response.Data[i].Quantity * response.Data[i].rate);

               }
                     // swal(response.Message);
                     // goback();
              }
              else
              {
                     swal(response.Message);
              }

          }
      });
}
// function goback() {
//     $('#newinvoice').empty();
//     $('.invoicelist').show();
// }
