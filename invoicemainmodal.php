<div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullwindowModalLabel">New Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                    <label for="productDesc">Customer Name</label>
                  <select class="form-control select2" id="customerName" name="customerName" style="width:100%;" onchange="changecustomername(this.value)">

                  </select>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveorder();">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- <script src="jscode/loadtax.js"></script> -->
 <!-- <script src="jscode/invoice.js"></script> -->
