<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add Comment</h3></div>
        <div class="card-body">
        <button class="btn btn-primary float-right" onclick="goback()" style="float:right;">Back</button>
        <div class="row">
                    <div class="col-md-4">
                   
                    </div>
                <div class="col-md-4" style="text-align: center;">
                        <div class="form-group">
                        <img id="prevImage" name="prevImage" src="" class="img-circle" alt="No Image" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            <div class="row">
            <div class="col-md-3">
                <label for="">Post Title</label>
            <strong id="pTitle"></strong>
            </div>
           
            <div class="col-md-3">
            <label for="">Customer</label>
            <strong id="pCust"></strong>
            </div>
            <div class="col-md-6">
                <label for="">Post Content</label>
            <strong id="pComment"></strong>
            </div>
           
            </div>
            <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            </div>
           <div class="row" style="margin-top:20px;">
             <div class="col-sm-2"></div>
             <div class="col-sm-8"  id="postComm">

             </div>
             <div class="col-sm-2"></div>
           </div>
        </div>
    </div>
</div>

<script>
loadComments(commentDetails);
</script>

