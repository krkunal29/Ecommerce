<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add New Tax</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="taxform" method="POST">

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Tax</label>
                            <input type="text" class="form-control" id="taxval" placeholder="Enter Tax">
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

$('#taxform').on('submit', function(e) {
    e.preventDefault();
    var taxval = $("#taxval").val();

    if(taxval===""){
      alert("Enter Tax");
    }
    else {
        $.ajax({
        url: url + 'addTax.php',
        type: 'POST',
        data:{
          tax:taxval
        },
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                taxList.set(response.Data[0].TaxId,response.Data[0]);
                showTaxs(taxList);
                goback();
            } else {
                alert(response.Message);
            }
        }
    });
  }
});
</script>
