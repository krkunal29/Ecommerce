<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add New Slider</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="blogform" method="POST">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sliderTitle">Banner Text</label>
                            <input type="text" class="form-control" name="sliderTitle" id="sliderTitle" placeholder="Enter Banner Text" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="smallTitle">Banner sub Text</label>
                            <input type="text" class="form-control" name="smallTitle" id="smallTitle" placeholder="Enter Banner sub Text" required>
                        </div>
                    </div>
                   
                </div>
               
                <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="productDesc">Brand Image</label>
                          <input type="file" name="imgname" id="imgname" class="form-control" accept="image/*" onchange="loadFile(event)" require>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="output">Brand Image view</label>
                          <img src="" alt="" id="output" width="110px" height="110px">
                      </div>
                  </div>

                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="button" onclick="goback()">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script src="jscode/loadFile.js"></script>
<script src="savecode/add-slider.js" charset="utf-8"></script>
