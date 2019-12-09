function loadUsers()
{

var html = '<option value="">Select Customer</option>';
for(let k of userList.keys()){
  let customerName = userList.get(k);
  html +='<option value='+customerName.userId+'>'+customerName.fname+' '+customerName.lname+'</option>';
}
$("#customerName").html(html);
$("#customerName").select2();
}
