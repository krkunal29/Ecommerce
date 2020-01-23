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
                                            <h5>Widget Statistic</h5>
                                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="../index.html"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Widgets</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Widget Statistic</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <!-- product profit start -->
                             <div class="col-xl-3 col-md-6">
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
                                        <p class="mb-0 text-white"><span class="label label-danger mr-10">+11%</span>From Previous Month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card prod-p-card card-blue">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-30">
                                            <div class="col">
                                                <h6 class="mb-5 text-white">Total Orders</h6>
                                                <h3 class="mb-0 fw-700 text-white">15,830</h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-database text-blue f-18"></i>
                                            </div>
                                        </div>
                                        <p class="mb-0 text-white"><span class="label label-primary mr-10">+12%</span>From Previous Month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
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
                                        <p class="mb-0 text-white"><span class="label label-success mr-10">+52%</span>From Previous Month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
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
                                        <p class="mb-0 text-white"><span class="label label-warning mr-10">+52%</span>From Previous Month</p>
                                    </div>
                                </div>
                            </div>
                            <!-- product profit end -->
                            <!-- page statustic chart start -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-red text-white">
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="mb-0">2,563</h4>
                                                <p class="mb-0">Visits</p>
                                            </div>
                                            <div class="col-4 text-right">
                                                <i class="ik ik-user f-30"></i>
                                            </div>
                                        </div>
                                        <div id="Widget-line-chart1" class="chart-line chart-shadow" style="width:100%;height:75px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-blue text-white">
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="mb-0">3,612</h4>
                                                <p class="mb-0">Orders</p>
                                            </div>
                                            <div class="col-4 text-right">
                                                <i class="ik ik-shopping-cart f-30"></i>
                                            </div>
                                        </div>
                                        <div id="Widget-line-chart2" class="chart-line chart-shadow" style="width:100%;height:75px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-green text-white">
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="mb-0">8,654</h4>
                                                <p class="mb-0">Likes</p>
                                            </div>
                                            <div class="col-4 text-right">
                                                <i class="ik ik-thumbs-up f-30"></i>
                                            </div>
                                        </div>
                                        <div id="Widget-line-chart3" class="chart-line chart-shadow" style="width:100%;height:75px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-yellow text-white">
                                    <div class="card-block">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="mb-0">3,550</h4>
                                                <p class="mb-0">Reviews</p>
                                            </div>
                                            <div class="col-4 text-right">
                                                <i class="ik ik-volume-2 f-30"></i>
                                            </div>
                                        </div>
                                        <div id="Widget-line-chart4" class="chart-line chart-shadow" style="width:100%;height:75px"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- page statustic chart end -->

                            <!-- Project statustic start -->
                            <div class="col-xl-6">
                                <div class="card proj-progress-card">
                                    <div class="card-block">
                                    <figure class="highcharts-figure">
                <div id="container"></div>
                        <p class="highcharts-description">
        This pie chart shows how the chart legend can be used to provide
        information about the individual slices.
    </p>
</figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card proj-progress-card">
                                    <div class="card-block">
                                    <figure class="highcharts-figure">
                                    <div id="Sales"></div>
    <p class="highcharts-description">
        Chart designed to show the difference between 0 and null in a 3D column
        chart. A null point represents missing data, while 0 is a valid value.
    </p>
</figure>
                                    </div>
                                </div>
                            </div>
                          
                           
                           
                               <div class="col-xl-12">
                                <div class="card product-progress-card">
                                    <div class="card-block">
                                        <div class="row pp-main">
                                            <div class="col-xl-3 col-md-6">
                                                <div class="pp-cont">
                                                    <div class="row align-items-center mb-20">
                                                        <div class="col-auto">
                                                            <i class="fas fa-cube f-24 text-mute"></i>
                                                        </div>
                                                        <div class="col text-right">
                                                            <h2 class="mb-0 text-blue">2476</h2>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-15">
                                                        <div class="col-auto">
                                                            <p class="mb-0">Total Product</p>
                                                        </div>
                                                        <div class="col text-right">
                                                            <p class="mb-0 text-blue"><i class="fas fa-long-arrow-alt-up mr-10"></i>64%</p>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-blue" style="width:45%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="pp-cont">
                                                    <div class="row align-items-center mb-20">
                                                        <div class="col-auto">
                                                            <i class="fas fa-tag f-24 text-mute"></i>
                                                        </div>
                                                        <div class="col text-right">
                                                            <h2 class="mb-0 text-red">843</h2>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-15">
                                                        <div class="col-auto">
                                                            <p class="mb-0">New Orders</p>
                                                        </div>
                                                        <div class="col text-right">
                                                            <p class="mb-0 text-red"><i class="fas fa-long-arrow-alt-down mr-10"></i>34%</p>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-red" style="width:75%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="pp-cont">
                                                    <div class="row align-items-center mb-20">
                                                        <div class="col-auto">
                                                            <i class="fas fa-random f-24 text-mute"></i>
                                                        </div>
                                                        <div class="col text-right">
                                                            <h2 class="mb-0 text-c-yellow">63%</h2>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-15">
                                                        <div class="col-auto">
                                                            <p class="mb-0">Conversion Rate</p>
                                                        </div>
                                                        <div class="col text-right">
                                                            <p class="mb-0 text-yellow"><i class="fas fa-long-arrow-alt-up mr-10"></i>64%</p>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-yellow" style="width:65%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="pp-cont">
                                                    <div class="row align-items-center mb-20">
                                                        <div class="col-auto">
                                                            <i class="fas fa-dollar-sign f-24 text-mute"></i>
                                                        </div>
                                                        <div class="col text-right">
                                                            <h2 class="mb-0 text-green">41M</h2>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-15">
                                                        <div class="col-auto">
                                                            <p class="mb-0">Conversion Rate</p>
                                                        </div>
                                                        <div class="col text-right">
                                                            <p class="mb-0 text-green"><i class="fas fa-long-arrow-alt-up mr-10"></i>54%</p>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-green" style="width:35%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- peoduct statustic end -->

                            <!-- analytic card start -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card social-card">
                                    <div class="card-body text-center">
                                        <h2 class="text-facebook mb-20"><i class="fab fa-facebook-f"></i></h2>
                                        <h3 class="text-facebook fw-700">6,750</h3>
                                        <p>Likes</p>
                                        <p class="mb-0 mt-15"><i class="fas fa-caret-up mr-10 f-18 text-green"></i>223 from last 7 days</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card social-card">
                                    <div class="card-body text-center">
                                        <h2 class="text-twitter mb-20"><i class="fab fa-twitter"></i></h2>
                                        <h3 class="text-twitter fw-700">9,752</h3>
                                        <p>Tweets</p>
                                        <p class="mb-0 mt-15"><i class="fas fa-caret-up mr-10 f-18 text-green"></i>623 from last 7 days</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card social-card">
                                    <div class="card-body text-center">
                                        <h2 class="text-dribbble mb-20"><i class="fab fa-dribbble"></i></h2>
                                        <h3 class="text-dribbble fw-700">8,752</h3>
                                        <p>Followers</p>
                                        <p class="mb-0 mt-15"><i class="fas fa-caret-up mr-10 f-18 text-green"></i>623 from last 7 days</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card social-card">
                                    <div class="card-body text-center">
                                        <h2 class="text-linkedin mb-20"><i class="fab fa-linkedin-in"></i></h2>
                                        <h3 class="text-linkedin fw-700">952</h3>
                                        <p>Followers</p>
                                        <p class="mb-0 mt-15"><i class="fas fa-caret-down mr-10 f-18 text-red"></i>98 from last 7 days</p>
                                    </div>
                                </div>
                            </div>
                            <!-- project-ticket end -->

                            <!-- analytic card start -->
                            <div class="col-xl-4 col-md-12">
                                <div class="card bg-facebook soc-cont-card">
                                    <div class="card-block">
                                        <div class="soc-slider">
                                            <div class="owl-carousel" id="fb-slider">
                                                <div class="item">
                                                    <p>Lorem Ipsum is simply of the dumy scrambled it to make a type specimen book.</p>
                                                    <div class="num-block">
                                                        <i class="far fa-thumbs-up mr-10"></i>5
                                                    </div>
                                                    <div class="num-block">
                                                        <i class="far fa-comments mr-10"></i>1
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <p>Lorem Ipsum is simply of the dumy scrambled it to make a type specimen book.</p>
                                                    <div class="num-block">
                                                        <i class="far fa-thumbs-up mr-10"></i>5
                                                    </div>
                                                    <div class="num-block">
                                                        <i class="far fa-comments mr-10"></i>1
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <i class="fab fa-facebook-f soc-cont-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-twitter soc-cont-card">
                                    <div class="card-block">
                                        <div class="soc-slider">
                                            <div class="owl-carousel" id="tw-slider">
                                                <div class="item">
                                                    <p>Lorem Ipsum is simply of the dumy scrambled it to make a type specimen book.</p>
                                                    <div class="num-block">
                                                        <i class="far fa-thumbs-up mr-10"></i>5
                                                    </div>
                                                    <div class="num-block">
                                                        <i class="far fa-comments mr-10"></i>1
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <p>Lorem Ipsum is simply of the dumy scrambled it to make a type specimen book.</p>
                                                    <div class="num-block">
                                                        <i class="far fa-thumbs-up mr-10"></i>5
                                                    </div>
                                                    <div class="num-block">
                                                        <i class="far fa-comments mr-10"></i>1
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <i class="fab fa-twitter soc-cont-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-google soc-cont-card">
                                    <div class="card-block">
                                        <div class="soc-slider">
                                            <div class="owl-carousel" id="gp-slider">
                                                <div class="item">
                                                    <p>Lorem Ipsum is simply of the dumy scrambled it to make a type specimen book.</p>
                                                    <div class="num-block">
                                                        <i class="far fa-thumbs-up mr-10"></i>5
                                                    </div>
                                                    <div class="num-block">
                                                        <i class="far fa-comments mr-10"></i>1
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <p>Lorem Ipsum is simply of the dumy scrambled it to make a type specimen book.</p>
                                                    <div class="num-block">
                                                        <i class="far fa-thumbs-up mr-10"></i>5
                                                    </div>
                                                    <div class="num-block">
                                                        <i class="far fa-comments mr-10"></i>1
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <i class="fab fa-google-plus-g soc-cont-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="right-sidebar">
                    <div class="sidebar-chat" data-plugin="chat-sidebar">
                        <div class="sidebar-chat-info">
                            <h6>Chat List</h6>
                            <form class="mr-t-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search for friends ..."> 
                                    <i class="ik ik-search"></i>
                                </div>
                            </form>
                        </div>
                        <div class="chat-list">
                            <div class="list-group row">
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Gene Newman">
                                    <figure class="user--online">
                                        <img src="../img/users/1.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Gene Newman</span>  <span class="username">@gene_newman</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Billy Black">
                                    <figure class="user--online">
                                        <img src="../img/users/2.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Billy Black</span>  <span class="username">@billyblack</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Herbert Diaz">
                                    <figure class="user--online">
                                        <img src="../img/users/3.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Herbert Diaz</span>  <span class="username">@herbert</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Sylvia Harvey">
                                    <figure class="user--busy">
                                        <img src="../img/users/4.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Sylvia Harvey</span>  <span class="username">@sylvia</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item active" data-chat-user="Marsha Hoffman">
                                    <figure class="user--busy">
                                        <img src="../img/users/5.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Marsha Hoffman</span>  <span class="username">@m_hoffman</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Mason Grant">
                                    <figure class="user--offline">
                                        <img src="../img/users/1.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Mason Grant</span>  <span class="username">@masongrant</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Shelly Sullivan">
                                    <figure class="user--offline">
                                        <img src="../img/users/2.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Shelly Sullivan</span>  <span class="username">@shelly</span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>

                <div class="chat-panel" hidden>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <a href="javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>  
                            <span class="user-name">John Doe</span> 
                            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="card-body">
                            <div class="widget-chat-activity flex-1">
                                <div class="messages">
                                    <div class="message media reply">
                                        <figure class="user--online">
                                            <a href="#">
                                                <img src="../img/users/3.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>Epic Cheeseburgers come in all kind of styles.</p>
                                        </div>
                                    </div>
                                    <div class="message media">
                                        <figure class="user--online">
                                            <a href="#">
                                                <img src="../img/users/1.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>Cheeseburgers make your knees weak.</p>
                                        </div>
                                    </div>
                                    <div class="message media reply">
                                        <figure class="user--offline">
                                            <a href="#">
                                                <img src="../img/users/5.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>Cheeseburgers will never let you down.</p>
                                            <p>They'll also never run around or desert you.</p>
                                        </div>
                                    </div>
                                    <div class="message media">
                                        <figure class="user--online">
                                            <a href="#">
                                                <img src="../img/users/1.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>A great cheeseburger is a gastronomical event.</p>
                                        </div>
                                    </div>
                                    <div class="message media reply">
                                        <figure class="user--busy">
                                            <a href="#">
                                                <img src="../img/users/5.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>There's a cheesy incarnation waiting for you no matter what you palete preferences are.</p>
                                        </div>
                                    </div>
                                    <div class="message media">
                                        <figure class="user--online">
                                            <a href="#">
                                                <img src="../img/users/1.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>If you are a vegan, we are sorry for you loss.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="javascript:void(0)" class="card-footer" method="post">
                            <div class="d-flex justify-content-end">
                                <textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
                                <button class="btn btn-icon" type="submit"><i class="ik ik-arrow-right text-success"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2018 ThemeKit v2.0. All Rights Reserved.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/" class="text-dark" target="_blank">Lavalite</a></span>
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
        <script src="jscode/apis.js"></script>
        <script>
            const loadData = () => {
    $.ajax({
        url: url + 'getAllSalesData.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.Data != null) {
               $('#sales').html(response.Data.Sale);
               $('#sold').html(response.Data.Quantity);
            }
        }
    });
};
loadData();
        // Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Kissan Agro Sales-2020'  
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'This year',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Month',
            y: 11.84
        }, {
            name: 'Week',
            y: 10.85
        }, {
            name: 'Today',
            y: 4.67
        }]
    }]
});

Highcharts.chart('Sales', {
    chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 25,
            depth: 70
        }
    },
    title: {
        text: 'Sales Chart'
    },
    subtitle: {
        text: 'Notice the difference between a 0 value and a null point'
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    xAxis: {
        categories: Highcharts.getOptions().lang.shortMonths,
        labels: {
            skew3d: true,
            style: {
                fontSize: '16px'
            }
        }
    },
    yAxis: {
        title: {
            text: null
        }
    },
    series: [{
        name: 'Sales',
        data: [2, 3, null, 4, 0, 5, 1, 4, 6, 3]
    }]
});
        </script>
    </body>
</html>
<?php
}
else{
    header('Location:index.php');
}
?>
