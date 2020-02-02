var sliderId = null; //for updation
var slider = new Map();
const loadSlider = () => {
    $.ajax({
        url: url + 'getAllSlider.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    slider.set(response.Data[i].Id, response.Data[i]);
                }
                showSlider(slider);
            }
        }
    });
}


var showSlider = slider => {
    $('#slider').dataTable().fnDestroy();
    $('.sliderData').empty();
    var tblData = '';
    for (let k of slider.keys()) {
        let slide = slider.get(k);
        tblData += '<tr><td><img src="apis/slider/'+k+'.jpg" alt="Slider image" class="rounded-circle img-40 align-top mr-15"></td>';
        tblData += '<td>' + slide.sliderTitle + '</td>';
        tblData += '<td>' + slide.smallTitle + '</td>';
        var slideStatus ='';
        if(slide.isActive==0){
            slideStatus ='<span class="badge badge-danger">Inactive</span>';
        }
        else{
            slideStatus ='<span class="badge badge-primary">Active</span>';
        }
        tblData += '<td>' + slideStatus + '</td>';
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editSlider(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" placeholder="activate/inactivate slider" onclick="removeBlog(' + (k) + ')"><i class="ik ik-edit"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.sliderData').html(tblData);
    $('#slider').dataTable({
        searching: true,
        retrieve: true,
        paging: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}
loadSlider();

const editSlider = Id => {
    Id = Id.toString();
    if (slider.has(Id)) {
        sliderId = Id;
        $('.bloglist').hide();
        $('#newblog').load('edit-slider.php');
    } else {
        alert('something goes wrong');
    }
}

const removeBlog = sliderId => {
    sliderId = sliderId.toString();
    if (slider.has(sliderId)) {
        let slide = slider.get(sliderId);
        var msg = '',msg1='',msg2='',msg3='';
        if(slide.isActive==0){
            msg = 'Do you really want to Activate this Banner ?';
            msg1 = 'Activate Now';
            msg2 = "Banner Activated Successfull";
            msg3 = "Activated";
        }
        else{
            msg = 'Do you really want to In Activate this Banner ?';
            msg1 = 'In Activate Now';
            msg2 = "Banner In Activated Successfull";
            msg3 = "InActivated";
        }
          swal({
                  title: "Are you sure?",
                  text: msg,
                  icon: "warning",
                  buttons: ["Cancel", msg1],
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
    $.ajax({
        url:url+'inactiveSlider.php',
        type:'POST',
        data:{
            sliderId:sliderId
        },
        dataType:'json',
        success:function(response){

          if(response.Responsecode==200){
              if(slide.isActive==0){
                slide.isActive = 1
              }else{
                slide.isActive = 0;
              }
              slider.set(sliderId, slide);
            showSlider(slider);
            swal({
                title: msg3,
                text: msg2,
                icon: "success",
            });
          }
          else{
              swal("No Action");
          }
        }
    });
  } else {
    swal("The Banner is safe!");
}
});

}
}

function addSlider() {
    $('.bloglist').hide();
    $('#newblog').load('add-slider.php');
}

function goback() {
    $('#newblog').empty();
    $('.bloglist').show();
}
