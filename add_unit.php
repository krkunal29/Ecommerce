<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add New Unit</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="unitform" method="POST">

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Unit</label>
                            <input type="text" class="form-control" id="unitval" placeholder="Enter Unit">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="button" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script>

$('#unitform').on('submit', function(e) {
    e.preventDefault();
    var unitval = $("#unitval").val();
    if(unitval===""){
      alert("Enter Unit");
    }
    else {
    $.ajax({
        url: url + 'addUnit.php',
        type: 'POST',
        data:{
          unit:unitval
        },
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                unitList.set(response.Data[0].unitId, response.Data[0]);
                showUnits(unitList);
                goback();
            } else {
                alert(response.Message);
            }
        }
    });
  }
});
</script>
