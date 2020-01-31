
function addopenInvoice() {
  $('.invoicelist').hide();
  $('#newinvoice').load('add_newinvoice.php');
}
var editarray;
var uinvoiceId = null; //for updation
var details = {};
const editinvoice = invoiceid => {
  $('.invoicelist').hide();
  uinvoiceId=invoiceid;
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
           $("#totaldiscount").val(editarray[0].discount);
           $("#Total"+rowid1).val(editarray[i].Quantity * editarray[i].rate);
         }
         qtyratecalculator(rowid1);
      }
  });
}

function changecustomername(customerId){
// console.log("CustomerId"+customerId);
// for(let k of userList.keys()){
//   console.log("key"+k);
//
// }
// console.log(userList);
let customerName = userList.get(customerId);
console.log(customerName);
// $("#customeremail").val(customerName.emailId);
$("#walletbal").html(customerName.wallet_amount);
$("#walletbalance").val(customerName.wallet_amount);
$("#cutomeraddress").val(customerName.billingAddress);
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
  qtyratecalculator(id);
}

function qtyratecalculator(id){
  var taxtbl ="";
  var totalamtinvoice =0; //  TotalinvoiceAmount
  var qty = $("#Qty"+id).val();

  var rate = $("#Rate"+id).val();
    // console.log("rate"+rate);
  var taxId = $("#TaxId"+id).val();
    // console.log("TaxId"+taxId);
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
    $("#Total"+id).val(parseFloat(qty)*parseFloat(rate));
    // var tablelength =  $('#invoicebody tr'). length;
    // console.log("tablelength"+tablelength);
    // This function for calculate table length
  // console.log("before"+taxtbl);
   $("#invoicetaxtblbody").empty(); //clear table boday

   taxtbl+="<tr>";
   taxtbl+="   <td style='width: 50%;'>Tax name </td>";
   taxtbl+="   <td style='width: 10%;'>CGST</td>";
   taxtbl+="   <td style='width: 10%;'>SGST</td>";
   taxtbl+=" <td style='width: 10%;'>Amount</td>";
   taxtbl+=" <td style='width: 10%;'>Tax </td>";
   taxtbl+=" <td style='width: 10%;'>After Amount</td>";
   taxtbl+="</tr>";
   // console.log("after"+taxtbl);
    for(var j=1;j<=rowid;j++){
        var totalamt = parseFloat($("#Total"+j).val());
        // console.log(totalamt);
        if(!isNaN(totalamt))
        {
           // console.log("rows"+j);
           var taxId = $("#TaxId"+j).val();
           // console.log("Tax ID"+taxId);
           var taxname = taxList.get(taxId);
           // console.log(taxname);
           var totalamt = parseFloat($("#Total"+j).val());
           // console.log(totalamt);
           var state = "Maharashtra";

           var totalexists = parseFloat($("#taxamtrow"+taxId).text());
           // console.log("Total  ==" + totalexists);
           if(state=="Maharashtra") // Same state
           {


             if(totalexists){
             totalamt =totalamt +totalexists;
             }
             else
             {
               taxtbl+="<tr id='row"+taxId+"'>";
               taxtbl+="<td style='width: 100%;'><span id='same"+taxId+"'></span></td>";
               taxtbl+="<td><span id='value"+taxId+"'></span</td>";
               taxtbl+="<td><span id='value1"+taxId+"'></span</td>";
               taxtbl+="<td><span id='taxamtrow"+taxId+"'></span</td>";
               taxtbl+="<td><span id='taxrow"+taxId+"'></span</td>";
               taxtbl+="<td><span id='taxafterrow"+taxId+"'></span</td>";
               taxtbl+="</tr>";
               // console.log("Total else"+totalexists);
               $("#invoicetaxtblbody").append(taxtbl);
               taxtbl ="";  // For remove the extra row
             }
             var taxvalue =  parseFloat(taxname.Tax);  // To Get Exact Tax Value
             // var halftax = (taxvalue)/2;               // To Get Half Tax value
             var taxamount = (totalamt*(taxvalue/100));  // To Get Tax Amount
             var halftaxamount = taxamount/2;         // To Get Half Tax Amount
             var fullmainvalue = (totalamt+taxamount);   // To Get  Main Amount
             var mainvalue = (totalamt+taxamount)/2;   // To Get Half Main Amount

             $("#same"+taxId).html(""+taxname.Taxname +"<font color='red' style='float:right;'>"+taxvalue +"</font>");
             $("#value"+taxId).html(""+halftaxamount.toFixed(2));
             // $("#same1"+taxId).html(""+taxname.Taxname +"<font color='red' style='float:right;'></font>");
             $("#value1"+taxId).html(""+halftaxamount.toFixed(2));
             $("#taxamtrow"+taxId).html(""+totalamt.toFixed(2));
             $("#taxrow"+taxId).html(""+taxamount.toFixed(2));
             $("#taxafterrow"+taxId).html(""+fullmainvalue.toFixed(2));
             var invoicetax = $("#taxafterrow"+taxId).html();
             // console.log("invoicetax"+invoicetax);
             totalamtinvoice = totalamtinvoice+parseFloat(invoicetax);
             $("#totalamtinvoice").val(totalamtinvoice);
             addDiscount();
           }
           else   // Different state
           {
              console.log("else value");
              // if(totalexists){
              // totalamt =totalamt +totalexists;
              // }
              // else
              // {
              //   taxtbl+="<tr id='row"+taxId+"'>";
              //   taxtbl+="<td style='width: 100%;'><span id='same"+taxId+"'></span></td>";
              //   taxtbl+="<td><span id='value"+taxId+"'></span</td>";
              //   taxtbl+="<td><span id='taxamtrow"+taxId+"'></span</td>";
              //   taxtbl+="<td><span id='taxrow"+taxId+"'></span</td>";
              //   taxtbl+="<td><span id='taxafterrow"+taxId+"'></span</td>";
              //   taxtbl+="</tr>";
              //   // console.log("Total else"+totalexists);
              //   $("#invoicetaxtblbody").append(taxtbl);
              //   taxtbl ="";  // For remove the extra row
              // }
              // var taxvalue =  parseFloat(taxname.Tax);  // To Get Exact Tax Value
              // // var halftax = (taxvalue)/2;               // To Get Half Tax value
              // var taxamount = (totalamt*(taxvalue/100));  // To Get Tax Amount
              // var halftaxamount = taxamount/2;         // To Get Half Tax Amount
              // var fullmainvalue = (totalamt+taxamount);   // To Get  Main Amount
              // var mainvalue = (totalamt+taxamount)/2;   // To Get Half Main Amount
              //
              // $("#same"+taxId).html(""+taxname.Taxname +"<font color='red' style='float:right;'>"+taxvalue +"</font>");
              // $("#value"+taxId).html(""+halftaxamount.toFixed(2));
              //
              // $("#taxamtrow"+taxId).html(""+totalamt.toFixed(2));
              // $("#taxrow"+taxId).html(""+taxamount.toFixed(2));
              // $("#taxafterrow"+taxId).html(""+fullmainvalue.toFixed(2));
              // var invoicetax = $("#taxafterrow"+taxId).html();
              // // console.log("invoicetax"+invoicetax);
              // totalamtinvoice = totalamtinvoice+parseFloat(invoicetax);
              // $("#totalamtinvoice").val(totalamtinvoice);
              // addDiscount();
           }
        }
        else{
          console.log("Table row absent"+j);
        }


    }



  }

}

function walletdisp(){
  var walletId=$("#walletId").val();
  var hiddenfinalamt=$("#hiddenfinalamt").val();
  if(walletId==0){
    $("#walletdisp").show();
    $("#walletId").val(1);
  }
  else{
    $("#walletdisp").hide();
    $("#walletId").val(0);
    $("#finalamtinvoice").val(hiddenfinalamt.toFixed(2));
  }
}

function walletapply(){
var walletbal =parseFloat($("#walletbal").text());
console.log("wallettextbal"+walletbal);
var walletbalance =parseFloat($("#walletbalance").val());
console.log("walletbalance"+walletbalance);
var finalamtinvoice = parseFloat($("#finalamtinvoice").val());
    if(walletbal>=walletbalance){
       if(finalamtinvoice>=walletbalance){
       var value = finalamtinvoice-walletbalance;
       $("#finalamtinvoice").val(value.toFixed(2));
       $("#walmsg").html("Wallet Balance Is Used In Transaction");
       $("#walletId").val(1);
       }
       else{
         swal("Need Final Amount More Input Feild");
         $("#walmsg").html("");
         $("#walletId").val(0);
       }

    }
    else{
      swal("Your Available Wallet Balance"+walletbal);
      $("#walletbalance").val(0);
      $("#walmsg").html("");
      $("#walletId").val(0);
    }


}
function addDiscount(){
  var totalamtinvoice=$("#totalamtinvoice").val();
  var totaldiscount=$("#totaldiscount").val();
  var finaldisamount = totalamtinvoice-totaldiscount;
  $("#finalamtinvoice").val(finaldisamount.toFixed(2));
  $("#hiddenfinalamt").val(finaldisamount.toFixed(2));
}

function goback() {
    $('#newinvoice').empty();
    $('.invoicelist').show();
    invoiceListFun();
}
