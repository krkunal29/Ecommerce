<style>
.error{
    color: red;
}
</style>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>Add New Product</h3></div>
        <div class="card-body">
            <form class="forms-sample" id="productform" method="POST" enctype="multipart/form-data">
            <div class="row">
                    <div class="col-md-4">
                    <input type="hidden" id="pId" name="productId" />
                    </div>
                <div class="col-md-4" style="text-align: center;">
                        <div class="form-group">
                        <img id="prevImage" name="prevImage" src="" class="img-circle" alt="No Image" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                <input type="hidden" id="productId" name="productId" />
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productTitle">Product Title</label>
                            <input type="text" id="productName" name="productName" class="form-control"  placeholder="Product Title">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="categoryId">Category</label>
                            <select  class="form-control select2" id="categoryId" name="categoryId" placeholder="Category" onchange="getSubCategory(this.value)">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="subcategoryId">Sub Category</label>
                            <select  class="form-control select2" id="subcategoryId" name="subcategoryId" placeholder="Sub Category">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="TaxId">Tax</label>
                            <select class="form-control" id="TaxId" name="TaxId">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="salePrice">Price</label>
                            <input type="text" class="form-control" id="salePrice" name="salePrice" placeholder="Price">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="displayPrice">Price for Diplay</label>
                            <input type="text" class="form-control" id="displayPrice"  name="displayPrice" placeholder="Display Price">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Quantity">Quantity</label>
                            <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="unitId">Unit</label>
                        <select class="form-control" id="unitId" name="unitId">
                            </select>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hsn">HSN No</label>
                            <input type="text" class="form-control" id="hsn"  name="hsn" placeholder="HSN number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sku">SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU number">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="productDesc">Brand Image</label>
                            <input type="file" name="imgname" id="imgname" class="form-control" accept="image/*" onchange="loadFile(event)">
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
<script src="jscode/loadtaxproduct.js"></script>
<script src="jscode/loadunit.js"></script>
<script src="jscode/loadcategory.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="jscode/loadFile.js"></script>
<!-- <script src="jscode/getAllTax.js"></script> -->
<!-- <script src="jscode/vendorList.js"></script> -->
<script src="jscode/product_validation.js"></script>
<script src="jscode/editproduct.js"> </script>
