<div class="row">

    <div class="card">
        <div class="card-header">
            <h3>Add New Invoice</h3></div>
        <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                    <label for="productDesc">Customer Name</label>
                  <!-- <select class="form-control select2" id="customerName" name="customerName" style="width:100%;" >

                  </select> -->
                  <input type="hidden" name="customerName" value="">
                  <input class="form-control" id="customerName1" placeholder="Enter Customer Name " type="text" readonly>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                    <label for="productDesc">Customer Email</label>
                    <input class="form-control" id="customeremail" placeholder="Enter Customer Email" type="email">
               </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="productDesc">Customer Address</label>
                  <textarea class="form-control" id="cutomeraddress" placeholder="Enter Customer address" rows="2"></textarea>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label for="exampleSelectGender">Invoice Date</label>
                        <input class="form-control" id="dropper-default" type="text" placeholder="Select Date">
                      <!-- <input  class="form-control" type="text" placeholder="Max Year 2020" id="invoicedate"/> -->
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <!-- <button type="button" class="btn btn-primary"  placeholder="ADD NEW ROW"><i class="fa fa-plus"></i></button> -->
                  <button type="button" class="btn btn-icon btn-success"  style="float: right;" onclick="addrow()"><i class="ik ik-plus"></i></button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card">
                  <div class="card-body">
                      <div class="dt-responsive">
                          <table id="invoicetbl" class="table table-striped table-bordered nowrap" style="overflow-y: scroll; max-height: 250px; display:block;">
                              <thead>
                                <tr>
                                    <th style="width: 35%;">Product Name</th>
                                    <th style="width: 10%;">HSN</th>
                                    <th style="width: 20%;">TAX</th>
                                    <th style="width: 10%;">QTY</th>
                                    <th style="width: 10%;">RATE</th>
                                    <th style="width: 10%;">Amount</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                              </thead>
                              <tbody id="invoicebody">


                              </tbody>

                          </table>
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="productDesc">Remark</label>
                  <textarea class="form-control" id="orderremark" placeholder="Enter Order Remark" rows="2"></textarea>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <table id="invoicetaxtbl" class="table table-striped table-bordered nowrap" style="overflow-y: scroll; max-height: 250px; display:block;">
                      <thead>

                      </thead>
                      <tbody id="invoicetaxtblbody">
                        <tr>
                          <td style="width: 100%;">Tax name </td>
                          <td>1000</td>
                        </tr>
                        <tr>
                          <td style="width: 100%;">Tax name </td>
                          <td>1000</td>
                        </tr>
                      </tbody>

                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="productDesc">Total Amount</label>
                    <input type="text" class="form-control" id="totalamtinvoice" value="0" readonly/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="productDesc">Discount</label>
                    <input type="text" class="form-control" id="totaldiscount" value="0" onchange="addDiscount();"/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">

                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">

                    <!-- <div class="content">

                    </div> -->
                    <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                            <button type="button" class="btn btn-success" onclick="walletdisp();">Wallet Balance
                            </button>
                            <span class="badge" id="walletbal" style="float:right;font-weight:bold;"></span>
                            </h4>
                          </div>
                          <input type="hidden" id="walletId" value="0"/>
                          <div id="walletdisp" class="" style="display:none">

                            <label for="productDesc"></label>
                            <div class="row">
                              <div class="col-sm-6">
                                <input type="text" class="form-control" id="walletbalance" value="0"/>
                              </div>
                              <div class="col-sm-6">
                                <button type="button" class="btn btn-primary" onclick="walletapply();">Apply</button>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="productDesc">Final Amount</label>
                    <input type="text" class="form-control" id="finalamtinvoice" value="0" readonly/>
                </div>
              </div>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-4" style="padding-left:40px;">
                        <div class="form-group" >
                  <button type="button" class="btn btn-primary" onclick="editorder();">Save changes</button>
                <button type="button" class="btn btn-secondary" onclick="goback();">Close</button>

              </div>
              </div>
          </div>
        </div>
    </div>
</div>
<script src="jscode/loadcustomer.js"></script>
<script type="text/javascript">
// function loadUsers()
// {
//
// var html = '<option value="">Select Customer</option>';
// for(let k of userList.keys()){
//   let customerName = userList.get(k);
//   html +='<option value="'+customerName.userId+'">'+customerName.fname+' '+customerName.lname+'</option>';
// }
// console.log(html);
// $("#customerName").html(html);
// $("#customerName").select2();
// }
loadUsers(); // load customer name
</script>
<!-- <script src="jscode/loadtax.js"></script>-->
<script src="jscode/loadproducts.js"></script>
<script type="text/javascript">
$("#dropper-default").dateDropper({
    dropWidth: 200,
    dropPrimaryColor: "#1abc9c",
    dropBorder: "1px solid #1abc9c"
})

</script>
<script src="savecode/editinvoice.js"></script>
