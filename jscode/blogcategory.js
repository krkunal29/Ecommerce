const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
var userId = null; //for updation
var details = {};


const showblogcategory = blogcategoryList => {
    $('#blogcategorys').dataTable().fnDestroy();
    $('.blogcategorysData').empty();
    var tblData = '';
    for (let k of blogcategoryList.keys()) {
        let blogcategory = blogcategoryList.get(k);
        tblData +="<tr>";

        tblData +="<td>"+blogcategory.category+"</td>";
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editblogcategory(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removeblogcategory(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.blogcategorysData').html(tblData);
    $('#blogcategorys').dataTable({
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

const editblogcategory = blogcategoryId => {
    blogcategoryId = blogcategoryId.toString();
    if (blogcategoryList.has(blogcategoryId)) {
        $('.blogcategorylist').hide();
        $('#newblogcategory').load('edit_blogcategory.php');
        const blogcategory = blogcategoryList.get(blogcategoryId);
        userId = blogcategoryId;
        details = blogcategory;
    } else {
        alert('something goes wrong');
    }
}

const removeblogcategory = blogcategoryId => {
    blogcategoryId = blogcategoryId.toString();
    $.ajax({
        url:url+'deleteBlogCategory.php',
        type:'POST',
        data:{
            categoryId:blogcategoryId
        },
        dataType:'json',
        success:function(response){

          if(response.Responsecode==200){
            blogcategoryList.delete(blogcategoryId.toString());
            showblogcategory(blogcategoryList);
          }
          else{
            // alert(response.Message);
              alert("Already Used Can't Delete");
          }
        }
    });
}

function addBlogcategory() {
    $('.blogcategorylist').hide();
    $('#newblogcategory').load('add_blogcategory.php');
}

function goback() {
    $('#newblogcategory').empty();
    $('.blogcategorylist').show();
}
