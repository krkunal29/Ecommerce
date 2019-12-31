const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
var userId = null; //for updation
var details = {};

const showinnerCategory = subinnerCategoryList => {
    $('#subinnerCategory').dataTable().fnDestroy();
    $('.subinnerCategoryData').empty();
    var tblData = '';
    for (let k of subinnerCategoryList.keys()) {
        let innerCategory = subinnerCategoryList.get(k);

        tblData +="<tr>";
        tblData +="<td>"+innerCategory.innersubcategoryName+"</td>";
        tblData +="<td>"+innerCategory.subcategoryName+"</td>";
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editinnerCategory(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removeinnerCategory(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.subinnerCategoryData').html(tblData);
    $('#subinnerCategory').dataTable({
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

const editinnerCategory = subinnerCategoryId => {
    subinnerCategoryId = subinnerCategoryId.toString();
    if (subinnerCategoryList.has(subinnerCategoryId)) {
        $('.subinnerCategoryList').hide();
        $('#newsubinnerCategory').load('edit_subinnerCategory.php');
        const subinnerCategory = subinnerCategoryList.get(subinnerCategoryId);
        userId = subinnerCategoryId;
        details = subinnerCategory;
    } else {
        swal('something goes wrong');
    }
}

const removeinnerCategory = subinnerCategoryId => {
    subinnerCategoryId = subinnerCategoryId.toString();
    if (subinnerCategoryList.has(subinnerCategoryId)) {
        // console.log(subinnerCategoryId);
        swal({
                title: "Are you sure?",
                text: "Do you really want to remove this flow ?",
                icon: "warning",
                buttons: ["Cancel", "Delete Now"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
    $.ajax({
        url:url+'deleteSubinnerCategory.php',
        type:'POST',
        data:{
            subinnerCategoryId:subinnerCategoryId
        },
        dataType:'json',
        success:function(response){

          if(response.Responsecode==200){
            subinnerCategoryList.delete(subinnerCategoryId.toString());
            showinnerCategory(subinnerCategoryList);
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
  } else {
      swal("The Sub innerCategory is safe!");
  }
});

}
}

function addsubinnerCategory() {
    $('.subinnerCategoryList').hide();
    $('#newsubinnerCategory').load('add_subinnerCategory.php');
}

function goback() {
    $('#newsubinnerCategory').empty();
    $('.subinnerCategoryList').show();
}
