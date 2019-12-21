const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
var userId = null; //for updation
var details = {};

const showcategory = subCategoryList => {
    $('#subCategory').dataTable().fnDestroy();
    $('.subCategoryData').empty();
    var tblData = '';
    for (let k of subCategoryList.keys()) {
        let category = subCategoryList.get(k);
        tblData +="<tr>";
        tblData +="<td>"+category.subcategoryName+"</td>";
        tblData +="<td>"+category.category+"</td>";
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editcategory(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removecategory(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.subCategoryData').html(tblData);
    $('#subCategory').dataTable({
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

const editcategory = subCategoryId => {
    subCategoryId = subCategoryId.toString();
    if (subCategoryList.has(subCategoryId)) {
        $('.subCategoryList').hide();
        $('#newsubCategory').load('edit_subcategory.php');
        const subcategory = subCategoryList.get(subCategoryId);
        userId = subCategoryId;
        details = subcategory;
    } else {
        swal('something goes wrong');
    }
}

const removecategory = subCategoryId => {
    subCategoryId = subCategoryId.toString();
    if (subCategoryList.has(subCategoryId)) {

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
        url:url+'deleteSubCategory.php',
        type:'POST',
        data:{
            subCategoryId:subCategoryId
        },
        dataType:'json',
        success:function(response){

          if(response.Responsecode==200){
            subCategoryList.delete(subCategoryId.toString());
            showcategory(subCategoryList);
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
      swal("The Sub Category is safe!");
  }
});

}
}

function addsubCategory() {
    $('.subCategoryList').hide();
    $('#newsubCategory').load('add_subcategory.php');
}

function goback() {
    $('#newsubCategory').empty();
    $('.subCategoryList').show();
}
