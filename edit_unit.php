
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Update Unit Details</h3></div>

            <div class="card-body">
                <form class="forms-sample" id="unitform" method="POST">

                    <div class="row">

                        <div class=, response.Data[0]"col-md-4">
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
function loadDetails(unit){
    $('#unitval').val(unit.unit);
}
loadDetails(details);
</script>
<script src="savecode/edit_unit.js" charset="utf-8"></script>
