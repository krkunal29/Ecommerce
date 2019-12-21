// const data = {
//     userId: $('#userId').val(),
//     roleId: $('#roleId').val()
// };
var userId = null; //for updation
var details = {};

const showTaxs = taxList => {
    $('#taxs').dataTable().fnDestroy();
    $('.taxData').empty();
    var tblData = '';
    for (let k of taxList.keys()) {
        let tax = taxList.get(k);
        tblData +="<tr>";
        tblData +="<td>"+tax.Taxname+"</td>";
        tblData +="<td>"+tax.Tax+"</td>";

        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editTax(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removeTax(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.taxData').html(tblData);
    $('#taxs').dataTable({
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


const editTax = taxId => {
    taxId = taxId.toString();
    if (taxList.has(taxId)) {
        $('.taxlist').hide();
        $('#newtax').load('edit_tax.php');
        const vendor = taxList.get(taxId);
        userId = taxId;
        details = vendor;
    } else {
        swal('something goes wrong');
    }
}

const removeTax = taxId => {
    taxId = taxId.toString();
    if (taxList.has(taxId)) {

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
        url:url+'deleteTax.php',
        type:'POST',
        data:{
          TaxId:taxId
        },
        dataType:'json',
        success:function(response){

          if(response.Responsecode==200){
            taxList.delete(taxId.toString());
            showTaxs(taxList);
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
    swal("The Tax is safe!");
}
});

}
}

function addTax() {
    $('.taxlist').hide();
    $('#newtax').load('add_tax.php');
}

function goback() {
    $('#newtax').empty();
    $('.taxlist').show();
}
