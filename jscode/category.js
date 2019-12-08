const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
var userId = null; //for updation
var details = {};

const showcategory = categoryList => {
    $('#category').dataTable().fnDestroy();
    $('.categoryData').empty();
    var tblData = '';
    for (let k of categoryList.keys()) {
        let category = categoryList.get(k);
        tblData +="<tr>";

        tblData +="<td>"+category.category+"</td>";
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editcategory(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removecategory(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.categoryData').html(tblData);
    $('#category').dataTable({
        searching: true,
        retrieve: true,
        paging: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}

const editcategory = categoryId => {
    categoryId = categoryId.toString();
    if (categoryList.has(categoryId)) {
        $('.categoryList').hide();
        $('#newcategory').load('edit_category.php');
        const blogcategory = categoryList.get(categoryId);
        userId = categoryId;
        details = blogcategory;
    } else {
        alert('something goes wrong');
    }
}

const removecategory = categoryId => {
    categoryId = categoryId.toString();
    $.ajax({
        url:url+'deleteProductCategory.php',
        type:'POST',
        data:{
            categoryId:categoryId
        },
        dataType:'json',
        success:function(response){

          if(response.Responsecode==200){
            categoryList.delete(categoryId.toString());
            showcategory(categoryList);
          }
          else{
            // alert(response.Message);
              alert("Already Used Can't Delete");
          }
        }
    });
}

function addcategory() {
    $('.categoryList').hide();
    $('#newcategory').load('add_category.php');
}

function goback() {
    $('#newcategory').empty();
    $('.categoryList').show();
}
