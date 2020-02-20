<?php
session_start();
if(isset($_SESSION['userId'])){
     ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kissan Agro |  Admin Template</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="plugins/chartist/dist/chartist.min.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>



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
                                        <i class="ik ik-layers bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Sale Statistic</h5>
                                           
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
                                                <a href="#">Sale</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Sale Statistic</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <!-- product profit start -->
                             <!-- <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-red">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col">
                                                <h6 class="mb-5 text-white">Total Sales</h6>
                                                <h3 class="mb-0 fw-700 text-white" >&#8377;<span id="sales"></span></h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-money-bill-alt text-red f-18"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-blue">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col">
                                                <h6 class="mb-5 text-white">Total Orders</h6>
                                                <h3 class="mb-0 fw-700 text-white"><span id="totalInv"></span></h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-database text-blue f-18"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-green">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col">
                                                <h6 class="mb-5 text-white">Average Price</h6>
                                                <h3 class="mb-0 fw-700 text-white">$6,780</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign text-green f-18"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-yellow">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col">
                                                <h6 class="mb-5 text-white">Product Sold</h6>
                                                <h3 class="mb-0 fw-700 text-white" id="sold">6,784</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tags text-warning f-18"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-xl-3 col-md-12">
                                <div class="card analytic-card card-green">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col-auto">
                                                <i class="fas fa-shopping-cart text-green f-18 analytic-icon"></i>
                                            </div>
                                            <div class="col text-right">
                                                <h3 class="mb-5 text-white" id="saleToday"></h3>
                                                <h6 class="mb-0 text-white">Total Sales today</h6>
                                            </div>
                                        </div>
                                        <p class="mb-0  text-white d-inline-block">Orders : </p>
                                        <h5 class=" text-white d-inline-block mb-0 ml-10" id="invToday"></h5>
                                        <h6 class="mb-0 d-inline-block  text-white float-right">Return:<span id="returnToday"></span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card analytic-card card-blue">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col-auto">
                                                <i class="fas fa-users text-blue f-18 analytic-icon"></i>
                                            </div>
                                            <div class="col text-right">
                                                <h3 class="mb-5 text-white" id="saleYest"></h3>
                                                <h6 class="mb-0 text-white">Total Sales yesterday</h6>
                                            </div>
                                        </div>
                                        <p class="mb-0 text-white d-inline-block">Orders : </p>
                                        <h5 class="text-white d-inline-block mb-0 ml-10" id="invYest"></h5>
                                        <h6 class="mb-0 d-inline-block text-white float-right">Return:<span id="returnYester"></span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card analytic-card card-red">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col-auto">
                                                <i class="fas fa-file-code text-red f-18 analytic-icon"></i>
                                            </div>
                                            <div class="col text-right">
                                                <h3 class="mb-5 text-white" id="saleMonth"></h3>
                                                <h6 class="mb-0 text-white">Total Sale Month</h6>
                                            </div>
                                        </div>
                                        <p class="mb-0 d-inline-block text-white">Orders : </p>
                                        <h5 class="text-white d-inline-block mb-0 ml-10" id="invMonth"></h5>
                                        <h6 class="mb-0 d-inline-block text-white float-right">Return:<span id="returnMon"></span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card analytic-card card-yellow">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col-auto">
                                                <i class="fas fa-file-code text-red f-18 analytic-icon"></i>
                                            </div>
                                            <div class="col text-right">
                                                <h3 class="mb-5 text-white" id="saleYear"></h3>
                                                <h6 class="mb-0 text-white">Total Sale Year</h6>
                                            </div>
                                        </div>
                                        <p class="mb-0 d-inline-block text-white">Orders : </p>
                                        <h5 class="text-white d-inline-block mb-0 ml-10" id="invYear"></h5>
                                        <h6 class="mb-0 d-inline-block text-white float-right">Return:<span id="returnYer">10</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card proj-progress-card">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6">
                                                <h6>Product Sold</h6>
                                                <h5 class="mb-30 fw-700">Today<span class="text-green ml-10" id="soldToday"></span></h5>
                                                <div class="progress">
                                                    <div class="progress-bar bg-red" style="width:25%"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <h6>Product Sold</h6>
                                                <h5 class="mb-30 fw-700">Yesterday<span class="text-red ml-10" id="soldYest"></span></h5>
                                                <div class="progress">
                                                    <div class="progress-bar bg-blue" style="width:65%"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <h6>Product Sold</h6>
                                                <h5 class="mb-30 fw-700">Month<span class="text-green ml-10" id="soldMonth"></span></h5>
                                                <div class="progress">
                                                    <div class="progress-bar bg-green" style="width:85%"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <h6>Product Sold</h6>
                                                <h5 class="mb-30 fw-700">Year<span class="text-green ml-10" id="soldYear"></span></h5>
                                                <div class="progress">
                                                    <div class="progress-bar bg-yellow" style="width:45%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card proj-progress-card">
                                    <div class="card-block">
                                    <figure class="highcharts-figure">
                <div id="donuts"></div>
                       
</figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card proj-progress-card">
                                    <div class="card-block">
                                    <figure class="highcharts-figure">
                                    <div id="Sales"></div>
    
</figure>
                                    </div>
                                </div>
                            </div>
                          
        
                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2018 Kissan Agro . All Rights Reserved.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://markedia.com/" class="text-dark" target="_blank">Markedia</a></span>
                    </div>
                </footer>
            </div>
        </div>
        
        
        

        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="quick-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <div class="input-wrap">
                                        <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                        <i class="ik ik-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="container">
                            <div class="apps-wrap">
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                                </div>
                                <div class="app-item">
                                    <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="plugins/owl.carousel/dist/owl.carousel.min.js"></script>
        <script src="plugins/chartist/dist/chartist.min.js"></script>
        <script src="dist/js/theme.min.js"></script>
        <script src="js/widget-statistic.js"></script>
        <script>
    var data = {
        userId:<?php echo $_SESSION['userId'];?>,
        roleId:<?php echo $_SESSION['roleId'];?>
    };
    </script>
        <script src="jscode/apis.js"></script>
        <script src="jscode/dashboard.js"></script>
    </body>
</html>
<?php
}
else{
    header('Location:index.php');
}
?>
