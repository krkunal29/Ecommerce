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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="productTitle">Product Title</label>
                            <input type="text" id="productName" name="productName" class="form-control"  placeholder="Product Title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoryId">Category</label>
                            <select  class="form-control select2" id="categoryId" name="categoryId" placeholder="Category" onchange="getSubCategory(this.value,1)">

                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subcategoryId">Sub Category</label>
                            <select  class="form-control select2" id="subcategoryId" name="subcategoryId" placeholder="sub Category" onchange="getinnerSubCategory(this.value,1)">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subcategoryId">Inner Sub Category</label>
                            <select  class="form-control select2" id="innersubcategoryId" name="innersubcategoryId" placeholder="Inner sub Category" onchange="getlastSubCategory(this.value,1)">

                            </select>
                        </div>
                    </div>
                </div>
                    <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subcategoryId">Last Sub Category</label>
                            <select  class="form-control select2" id="lastsubcategoryId" name="lastsubcategoryId" placeholder="Last sub Category">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                            <label for="pexpiryDate">Product Expiry Date</label>
                        <input type="date" id="pexpiryDate" name="pexpiryDate" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                        </div>
                    </div>
</div>
<div class="row">
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
<script src="jscode/getSubCategoryfunction.js"></script>
<script src="jscode/getinnerSubCategoryfunction.js"></script>
<script src="jscode/getlastSubCategoryfunction.js"></script>

<!-- <script src="jscode/loadsubcategory.js"></script> -->
<script src="js/jquery.validate.js"></script>
<script src="jscode/loadFile.js"></script>
<script src="jscode/product_validation.js"></script>
<script src="jscode/addproduct.js"> </script>
