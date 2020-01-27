<?php
 session_start();
if(isset($_SESSION['userId'])){
     ?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <?php include "metatag.php"; ?>

        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
          <link rel="stylesheet" href=" plugins/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/jquery-minicolors/jquery.minicolors.css">
        <link rel="stylesheet" href="plugins/datedropper/datedropper.min.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
       <div class="wrapper">
            <?php include 'navbar.php';?>
            <div class="page-wrap">
                <?php include 'sidebar.php';?>
                <div class="main-content">
                    <div class="container-fluid">
                      <div class="page-header">
                          <div class="row align-items-end">
                              <div class="col-lg-8">
                                  <div class="page-header-title">
                                      <i class="ik ik-inbox bg-blue"></i>
                                      <div class="d-inline">
                                          <h5>Dashboard</h5>
                                          <!-- <span>See all users with their roles</span> -->
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-4">
                                  <nav class="breadcrumb-container" aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item">
                                              <a href="#"><i class="ik ik-home"></i></a>
                                          </li>
                                          <li class="breadcrumb-item">
                                              <a href="#">Dashboard</a>
                                          </li>
                                          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                      </ol>
                                  </nav>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-red st-cir-card text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div id="status-round-1" class="chart-shadow st-cir-chart" style="width:80px;height:80px">
                                                <h5>
                                                  <span id="hblogsp"></span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col text-center">
                                            <h3 class=" fw-700 mb-5"><span id="tblogsp"></span></h3>
                                            <h6 class="mb-0 ">Total Blog</h6>
                                        </div>
                                    </div>
                                    <span class="st-bt-lbl"><span id="blogsp"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-blue st-cir-card text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div id="status-round-2" class="chart-shadow st-cir-chart" style="width:80px;height:80px">
                                                <h5><span id="hproductsp"></span></h5>
                                            </div>
                                        </div>
                                        <div class="col text-center">
                                            <h3 class="fw-700 mb-5"><span id="tproductsp"></span></h3>
                                            <h6 class="mb-0">Total Product</h6>
                                        </div>
                                    </div>
                                    <span class="st-bt-lbl"><span id="productsp"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-green st-cir-card text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div id="status-round-3" class="chart-shadow st-cir-chart" style="width:80px;height:80px">
                                                <h5><span id="husercountsp"></span></h5>
                                            </div>
                                        </div>
                                        <div class="col text-center">
                                            <h3 class="fw-700 mb-5"><span id="tusercountsp"></span></h3>
                                            <h6 class="mb-0">User Count</h6>
                                        </div>
                                    </div>
                                    <span class="st-bt-lbl"><span id="usercountsp"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-yellow st-cir-card text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div id="status-round-4" class="chart-shadow st-cir-chart" style="width:80px;height:80px">
                                                <h5><span id="hcategorycountsp"></span></h5>
                                            </div>
                                        </div>
                                        <div class="col text-center">
                                            <h3 class="fw-700 mb-5"><span id="tcategorycountsp"></span></h3>
                                            <h6 class="mb-0">Category</h6>
                                        </div>
                                    </div>
                                    <span class="st-bt-lbl"><span id="categorycountsp"></span></span>
                                </div>
                            </div>
                        </div>

                      </div>
                      <div class="row clearfix">
                          <div class="col-lg-3 col-md-6 col-sm-12">
                              <div class="widget bg-primary">
                                  <div class="widget-body">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                              <h6>Sub Blog Category</h6>
                                              <h2><span id="subblogcountsp"></span></h2>
                                          </div>
                                          <div class="icon">
                                              <i class="ik ik-box"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-12">
                              <div class="widget bg-success">
                                  <div class="widget-body">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                              <h6>Sub Category</h6>
                                              <h2><span id="subcategorycountsp"></span></h2>
                                          </div>
                                          <div class="icon">
                                              <i class="ik ik-shopping-cart"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-12">
                              <div class="widget bg-warning">
                                  <div class="widget-body">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                              <h6>Total Tax</h6>
                                              <h2><span id="taxcountsp"></span></h2>
                                          </div>
                                          <div class="icon">
                                              <i class="ik ik-inbox"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6 col-sm-12">
                              <div class="widget bg-danger">
                                  <div class="widget-body">
                                      <div class="d-flex justify-content-between align-items-center">
                                          <div class="state">
                                              <h6>Total Unit </h6>
                                              <h2><span id="unitcountsp"></span></h2>
                                          </div>
                                          <div class="icon">
                                              <i class="ik ik-users"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="card">

                                  <div class="card-body">
                                      <div class="text-center">
                                          <img src="img/user.jpg" id="previmg1" class="rounded-circle" width="150" />
                                          <h4 class="mt-20 mb-0"><span id="spanname"></span></h4>

                                      </div>
                                  </div>
                                  <hr class="mb-0">
                                  <div class="card-body">
                                      <small class="text-muted d-block">Email address </small>
                                      <h6 id="userE"><span id="spanemail"></span></h6>
                                      <small class="text-muted d-block pt-10">Phone</small>
                                      <h6 id="userP"><span id="spanphone"></span></h6>
                                      <small class="text-muted d-block pt-10">City</small>
                                      <h6 id="userA"><span id="spancity"></span></h6>
                                      <small class="text-muted d-block pt-10">State</small>
                                      <h6 id="userA"><span id="spanstate"></span></h6>
                                      <small class="text-muted d-block pt-10">Country</small>
                                      <h6 id="userA"><span id="spancountry"></span></h6>
                                      <small class="text-muted d-block pt-10">Address</small>
                                      <h6 id="userA"><span id="spanaddress"></span></h6>
                                      <input type="hidden" id="cityId"/>
                                      <input type="hidden" id="stateId"/>
                                      <input type="hidden" id="countryId"/>
                                  </div>

                              </div>
                          </div>
                          <!-- <div class="col-md-4">
                              <div class="card">
                                  <div class="card-body">
                                      <div id="datepickerwidget"></div>
                                  </div>
                              </div>
                          </div> -->
                          <div class="col-md-6">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="d-flex">
                                          <h4 class="card-title">Weather Report</h4>
                                          <!-- <select class="form-control w-25 ml-auto">
                                              <option selected="">Today</option>
                                              <option value="1">Weekly</option>
                                          </select> -->
                                    </div>
                                      <div class="d-flex align-items-center flex-row mt-10">
                                          <div class="p-2 f-50 text-info"><i class="wi wi-day-showers"></i> <span><span id="currenttemp"></span><sup>°</sup></span></div>
                                          <div class="p-2">
                                          <h3 class="mb-0"><?php echo date("d/m/Y"); ?></h3><small><?php echo date("l"); ?>, <span id="tempcityname"></span></small></div>
                                      </div>
                                      <table class="table table-borderless">
                                          <tbody>
                                            <tr>
                                                <td>Weather Conditon</td>
                                                <td class="font-medium"> <span id="tempweathercond"></span> </td>
                                            </tr>
                                              <tr>
                                                  <td>Wind</td>
                                                  <td class="font-medium">ESE <span id="tempwindname"></span> mph</td>
                                              </tr>
                                              <tr>
                                                  <td>Humidity</td>
                                                  <td class="font-medium"><span id="temphumidityname"></span>%</td>
                                              </tr>
                                              <tr>
                                                  <td>Pressure</td>
                                                  <td class="font-medium"><span id="temppressurename"></span> in</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                      <hr>
                                      <ul class="list-unstyled row text-center city-weather-days mb-0">
                                          <li class="col"><i class="wi wi-day-sunny mr-5"></i><span>Max Temp</span><h3><span id="tempcitymaxname"></span><sup>°</sup></h3></li>
                                          <li class="col"><i class="wi wi-day-cloudy mr-5"></i><span>Min Temp</span><h3><span id="tempcityminname"></span><sup>°</sup></h3></li>

                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>


                        <?php include "footer.php"; ?>
                    </div>
                </div>
              </div>
            </div>



               <?php include "dashboardmodal.php"; ?>

                <script src="js/jquery.min.js"></script>
                <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->

                <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
                <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
                <script src="plugins/screenfull/dist/screenfull.js"></script>
                <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
                <script src="dist/js/theme.min.js"></script>
                <!-- <script src="js/datatables.js"></script> -->
                <script src="plugins/moment/moment.js"></script>
                <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
                <script src="plugins/summernote/dist/summernote-bs4.min.js"></script>
                <script src="js/layouts.js"></script>
                <script src="plugins/select2/dist/js/select2.min.js"></script>
                <script>
                var data = {
                    userId:'<?php echo $_SESSION['userId'];?>'
                };
                </script>
                <script src="jscode/apis.js"></script>
                <script src="jscode/getalldashboardcount.js"></script>

                <!-- <script src="plugins/amcharts3/amcharts/amcharts.js"></script>
                <script src="plugins/amcharts3/amcharts/gauge.js"></script>
                <script src="plugins/amcharts3/amcharts/serial.js"></script>
                <script src="plugins/amcharts3/amcharts/themes/light.js"></script>
                <script src="plugins/amcharts3/amcharts/pie.js"></script>
                <script src="plugins/ammap3/ammap/ammap.js"></script>
                <script src="plugins/ammap3/ammap/maps/js/usaLow.js"></script>
                <script src="dist/js/theme.min.js"></script>
                <script src="js/widget-chart.js"></script> -->
                <!-- <script src="jscode/blog.js"></script> -->
               

    </body>

</html>
<?php
}else{
    header('Location:index.php');
}
?>
