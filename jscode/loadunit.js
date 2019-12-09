function loadunit()
{

var html = '<option value="">Select Unit</option>';
for(let k of unitList.keys()){
  let unitname = unitList.get(k);
  html +='<option value='+unitname.unitId+'>'+unitname.unit+'</option>';
}
$("#unitId").html(html);
}
$("#unitId").select2();
loadunit();
