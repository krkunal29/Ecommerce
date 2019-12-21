const data = {
    userId: $('#userId').val(),
    roleId: $('#roleId').val()
};
var userId = null; //for updation
var details = {};

const showUnits = unitList => {
    $('#units').dataTable().fnDestroy();
    $('.unitsData').empty();
    var tblData = '';
    for (let k of unitList.keys()) {

        let units = unitList.get(k);

        tblData +="<tr>";

        tblData +="<td>"+units.unit+"</td>";

        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editUnit(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removeUnit(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.unitsData').html(tblData);
    $('#units').dataTable({
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


const editUnit = unitId => {
    unitId = unitId.toString();
    if (unitList.has(unitId)) {
        $('.unitlist').hide();
        $('#newunit').load('edit_unit.php');
        const unit = unitList.get(unitId);
        userId = unitId;
        details = unit;
    } else {
        alert('something goes wrong');
    }
}

const removeUnit = unitId => {
  // console.log(unitId);
    unitId = unitId.toString();
    if (unitList.has(unitId)) {

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
        url:url+'deleteUnit.php',
        type:'POST',
        data:{
          unitId:unitId
        },
        dataType:'json',
        success:function(response){

          if(response.Responsecode==200){
            $('#newunit').empty();
            $('.unitlist').show();
            unitList.delete(unitId.toString());
            showUnits(unitList);
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
    swal("The Unit is safe!");
}
});

}
}

function addUnit() {
    $('.unitlist').hide();
    $('#newunit').load('add_unit.php');
}

function goback() {
    $('#newunit').empty();
    $('.unitlist').show();
}
