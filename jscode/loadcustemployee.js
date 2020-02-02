function loadUsers()
{

var html = '<option></option>';
for(let k of userList.keys()){
  let customerName = userList.get(k);

  html +='<option value="'+customerName.customerId+'">'+customerName.custName+'   '+customerName.contactNumber+'</option>';
}
// console.log(html);
$("#customerName").html(html);
$("#customerName").select2({
  placeholder:"Select Refferal Customer "
});
}
loadUsers();
