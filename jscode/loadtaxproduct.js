function loadtax()
{
var html = '<option value="">Select Tax</option>';
for(let k of taxList.keys()){
  var taxname = taxList.get(k);
  html +='<option value='+taxname.TaxId+'>'+taxname.Taxname+' ('+taxname.Tax+') </option>';
}
$("#TaxId").html(html);
}
$("#TaxId").select2();
loadtax();
