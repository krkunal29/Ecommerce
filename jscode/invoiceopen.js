// $("#invoiceDate").datetimepicker();
// $('#invoiceDate').datetimepicker({
//     format: 'L'
// });
$("#dropper-default").dateDropper({
    dropWidth: 200,
    dropPrimaryColor: "#1abc9c",
    dropBorder: "1px solid #1abc9c"
})
function addopenInvoice() {
    loadUsers(); // customer Name Set
     $("#fullwindowModal").modal();


}
function changecustomername(customerId){
let customerName = userList.get(customerId);
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
}
function deleterow(id){
  $("#row"+id).remove();
}
function qtyratecalculator(id){
  var qty = $("#Qty"+id).val();
  var rate = $("#Rate"+id).val();
  if(qty==""){
    qty=1;
  }
  if(rate==""){
    rate=1;
  }
  $("#Total"+id).val(parseFloat(qty)*parseFloat(rate));
}
