const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
var userId = null; //for updation
var details = {};

const showlastCategory = sublastCategoryList => {
    $('#sublastCategory').dataTable().fnDestroy();
    $('.sublastCategoryData').empty();
    var tblData = '';
    for (let k of sublastCategoryList.keys()) {
        let lastCategory = sublastCategoryList.get(k);
        // console.log(lastCategory);
        tblData +="<tr>";

        tblData +="<td>"+lastCategory.lastsubcategoryName+"</td>";
        tblData +="<td>"+lastCategory.innersubcategoryName+"</td>";
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editlastCategory(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removelastCategory(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.sublastCategoryData').html(tblData);
    $('#sublastCategory').dataTable({
        searching: true,
        retrieve: true,
        paging: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1,2] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}

const editlastCategory = sublastCategoryId => {
    sublastCategoryId = sublastCategoryId.toString();
    if (sublastCategoryList.has(sublastCategoryId)) {
        $('.sublastCategoryList').hide();
        $('#newsublastCategory').load('edit_sublastCategory.php');
        const sublastCategory = sublastCategoryList.get(sublastCategoryId);
        userId = sublastCategoryId;
        details = sublastCategory;
    } else {
        swal('something goes wrong');
    }
}



const removelastCategory = sublastCategoryId => {
    sublastCategoryId = sublastCategoryId.toString();
    if (sublastCategoryList.has(sublastCategoryId)) {
        // console.log(sublastCategoryId);
        // swal({
        //         title: "Are you sure?",
        //         text: "Do you really want to remove this flow ?",
        //         icon: "warning",
        //         buttons: ["Cancel", "Delete Now"],
        //         dangerMode: true,
        //     })
        //     .then((willDelete) => {
        //         if (willDelete) {
    $.ajax({
        url:url+'deleteSublastCategory.php',
        type:'POST',
        data:{
            sublastCategoryId:sublastCategoryId
        },
        dataType:'json',
        success:function(response){

          if(response.Responsecode==200){
            sublastCategoryList.delete(sublastCategoryId.toString());
            showlastCategory(sublastCategoryList);
            swal({
                title: "Deleted",
                text: response.Message,
                icon: "success",
            });
          }
          else{
            // alert(response.Message);
              swal("Already Used Can't Delete");
          }
        }
    })
//   } else {
//       swal("The Sub innerCategory is safe!");
//   }
// });

}
}
function addsublastCategory() {
    $('.sublastCategoryList').hide();
    $('#newsublastCategory').load('add_sublastCategory.php');
}

function goback() {
    $('#newsublastCategory').empty();
    $('.sublastCategoryList').show();
}
