<style>
.error{
    color: red;
}
</style>
<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Update Tax</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="taxform" method="POST">

                <div class="row">
                  <div class="col-md-4">
                      <div cla  taxList.set(userId.toString());ss="form-group">
                        <input type="hidden" id="taxId" name="taxId" />
                          <label for="productDesc">Tax Name</label>
                          <input type="text" class="form-control" id="taxname" name="taxname" placeholder="Enter Tax Name">
                      </div>
                  </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Tax</label>
                            <input type="text" class="form-control" id="tax"  name="tax" placeholder="Enter Tax">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="button" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery.validate.js"></script>
<script src="jscode/tax_validate.js"></script>
<script>
function loadDetails(tax){
  $('#taxId').val(tax.TaxId);
  $('#taxname').val(tax.Taxname);
  $('#tax').val(tax.Tax);

}
loadDetails(details);
$('#taxform').on('submit', function(e) {
    e.preventDefault();
    var returnVal = $("#taxform").valid();
    if (returnVal) {
        $.ajax({
        url: url + 'editTax.php',
        type: 'POST',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {

            if (response.Responsecode == 200) {
                taxList.set(userId.toString());
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
