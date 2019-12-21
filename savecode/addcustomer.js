function changeuserId(){
  var usertypeid = $("#userTypeId").val();
  // console.log(usertypeid);
  if(usertypeid==2){
          $("#showtehsil").show();
          $("#showpeek").show();
          $("#showhector").show();
          $("#showwaterstat").show();
  }
  else
  {
    $("#showtehsil").hide();
    $("#showpeek").hide();
    $("#showhector").hide();
    $("#showwaterstat").hide();
  }
}
function loadUserRoles()
{
// console.log(roleList);
var html = '<option value="">Select User Roles</option>';
for(let k of roleList.keys()){
  let rolename = roleList.get(k);
  html +='<option value='+rolename.roleId+'>'+rolename.role+'</option>';
}
$("#userTypeId").html(html);
}
$("#userTypeId").select2();
loadUserRoles();
// $("#blogStatus").select2();

$('#customerform').on('submit', function(e) {
  e.preventDefault();
  var returnVal = $("#customerform").valid();
  if (returnVal) {
      $.ajax({
      url: url + 'addUser.php',
      type: 'POST',
      data:new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
          // console.log(response);
          if (response.Responsecode == 200) {
            userList.set(response.Data.userId, response.Data);
              showUsers(userList);
              goback();
              swal({
                    position: 'top-end',
                    icon: 'success',
                    title: response.Message,
                    Button: false,
                    timer: 1500
                })
          } else {
              swal(response.Message);
          }
      }
  });
 }

});
