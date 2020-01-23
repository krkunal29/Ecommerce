
function addopenInvoice() {
  $('.invoicelist').hide();
  $('#newinvoice').load('add_newinvoice.php');
}
var editarray;
const editinvoice = invoiceid => {
  $('.invoicelist').hide();
  $('#newinvoice').load('edit_newinvoice.php');
  $.ajax({
      url: url + 'getinvoicedata.php',
      type: 'POST',
      dataType: 'json',
      data :{
      transactionId:invoiceid
      },
      success: function(response) {
         // console.log("edit - invoiceopen1.js"+response.Data);
         if (response.Responsecode == 200) {
           // console.log(response.Responsecode);
           const count = response.Data.length;
           editarray = response.Data;
           $("#customeremail").val(response.Data[0].emailId);
           $("#cutomeraddress").val(response.Data[0].contactAddress);
           $("#orderremark").val(response.Data[0].remark);
           $("#dropper-default").val(response.Data[0].invDate);
           rowid =0;
           for(var i=0;i<count;i++){
             rowid+=1;
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
             // console.log(rowhtml);
             $("#invoicebody").prepend(rowhtml);
             loadtax(rowid);
             loadproducts(rowid);
             $("#ProductId"+rowid).select2();
             $("#TaxId"+rowid).select2();


           }

          }
          else
          {
                 swal(response.Message);
          }

      },
      complete:function(){
         // console.log("Edit Array "+editarray);
         let count1 = editarray.length;

          rowid1 =0;
         for(var i=0;i<count1;i++){
          rowid1+=1;
                 // console.log(editarray[i].productId);
           $("#customerName").val(editarray[0].userId).trigger('change'); // customer name set here
           $("#ProductId"+rowid1).val(editarray[i].productId).trigger('change');
           $("#productHSN"+rowid1).val(editarray[i].t_description);
           $("#TaxId"+rowid1).val(editarray[i].taxId).trigger('change');
           $("#Qty"+rowid1).val(editarray[i].Quantity);
           $("#Rate"+rowid1).val(editarray[i].rate);
           $("#Total"+rowid1).val(editarray[i].Quantity * editarray[i].rate);
         }
      }
  });
}

function changecustomername(customerId){
// console.log("CustomerId"+customerId);
// for(let k of userList.keys()){
//   console.log("key"+k);
//
// }
console.log(userList);
let customerName = userList.get(customerId);
console.log(customerName);
$("#customeremail").val(customerName.emailId);
$("#cutomeraddress").val(customerName.contactAddress);
}

function changeproduct(productId,rowId){
var products = productList.get(productId);
// console.log(products);
$("#productHSN"+rowId).val(products.HSN);
$("#Rate"+rowId).val(products.salePrice);
qtyratecalculator(rowId);

}
var rowid =0;
var rowid1 =0;
var rowhtml="";
function addrow(){
    rowid+=1;
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
    rowhtml+='  <select class="form-control" id="TaxId'+rowid+'" name="TaxId'+rowid+'"  style="width:100%;" onchange="qtyratecalculator('+rowid+')">';
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
}
function deleterow(id){
  $("#row"+id).remove();
}
function qtyratecalculator(id){
  var taxtbl ="";
  var qty = $("#Qty"+id).val();
  console.log("qty"+qty);
  var rate = $("#Rate"+id).val();
    console.log("rate"+rate);
  var taxId = $("#TaxId"+id).val();
    console.log("TaxId"+taxId);
  if(qty==""){
    qty=1;
  }
  if(rate==""){
    rate=1;
  }
  if(taxId==""){
    // swal("Select Tax");
  }
  else{
    var taxname = taxList.get(taxId);
    console.log(taxname);

    $("#Total"+id).val(parseFloat(qty)*parseFloat(rate));
    var totalamt = parseFloat($("#Total"+id).val());
    console.log(totalamt);
    var state = "Maharashtra";
    // $("#invoicetaxtblbody").empty(); clear table boday
    if(state=="Maharashtra")
    {
      console.log("if value");
      var taxvalue =  parseFloat(taxname.Tax);
      var halftax = (taxvalue)/2;
      console.log("halftax"+halftax);
      var taxamount = (totalamt*(taxvalue/100));

      var halftaxamount = taxamount/2;
      var mainvalue = (totalamt+taxamount)/2;
      // console.log("halfvalue"+halfvalue);
      taxtbl+="<tr>";
      taxtbl+="<td style='width: 100%;'><span id='same"+taxId+"'></span></td>";
      taxtbl+="<td><span id='value"+taxId+"'></span</td>";
      taxtbl+="</tr>";
      taxtbl+="<tr>";
      taxtbl+="<td style='width: 100%;'><span id='same1"+taxId+"'></span></td>";
      taxtbl+="<td><span id='value1"+taxId+"'></span</td>";
      taxtbl+="</tr>";
      $("#invoicetaxtblbody").append(taxtbl);
      $("#same"+taxId).html("CGST "+taxname.Taxname +"("+halftax.toFixed(2)+")"+"<font color='red' style='float:right;'>"+halftaxamount.toFixed(2)+"</font>");
      $("#value"+taxId).html(""+mainvalue.toFixed(2));
      $("#same1"+taxId).html("SGST "+taxname.Taxname +"("+halftax.toFixed(2)+")"+"<font color='red' style='float:right;'>"+halftaxamount.toFixed(2)+"</font>");
      $("#value1"+taxId).html(""+mainvalue.toFixed(2));

    }
    else
    {
      console.log("else value");
      taxtbl+="<tr>";
      taxtbl+="<td style='width: 100%;'><span id='same"+taxId+"'></span></td>";
      taxtbl+="<td><span id='value"+taxId+"'></span</td>";
      taxtbl+="</tr>";
      $("#invoicetaxtblbody").append(taxtbl);
    }

  }

}

function goback() {
    $('#newinvoice').empty();
    $('.invoicelist').show();
}
