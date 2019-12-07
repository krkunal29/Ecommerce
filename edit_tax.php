<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Update Tax</h3></div>
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
function loadDetails(tax){
    $('#taxval').val(tax.Tax);

}
loadDetails(details);
$('#taxform').on('submit', function(e) {
    e.preventDefault();
    var taxval = $("#taxval").val();
    if(taxval===""){
      alert("Enter Tax");
    }
    else {
      var obj = {
        TaxId: userId,
        Tax:taxval
        };
        $.ajax({
        url: url + 'editTax.php',
        type: 'POST',
        data:obj,
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                taxList.set(userId.toString(),obj);
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
