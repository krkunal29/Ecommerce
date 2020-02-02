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
        <link rel="stylesheet" href="loader.css">
        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href=" plugins/select2/dist/css/select2.min.css">

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
        <input type="hidden" id="roleId" value="<?php echo $roleId;?>"/>
        <input type="hidden" id="userId" value="<?php echo $userId;?>"/>
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
                                          <h5>Inner Sub Category List</h5>
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
                                              <a href="#">Sub Inner Category</a>
                                          </li>
                                          <li class="breadcrumb-item active" aria-current="page">Sub Inner Category List</li>
                                      </ol>
                                  </nav>
                              </div>
                          </div>
                      </div>
                        <div id="newsubinnerCategory"></div>
                        <div class="row subinnerCategoryList">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                      <div class="col-md-12">
                                        <div class="row">
                                          <div class="col-sm-4">
                                            <h3>Sub Inner Category List</h3>
                                          </div>
                                          <div class="col-sm-4">

                                          </div>
                                          <div class="col-sm-4">
                                            <button type="button" class="btn btn-primary" style="float: right;" onclick="addsubinnerCategory();" >New Sub Inner Category</button>
                                          </div>
                                        </div>
                                        </div>


                                    </div>

                                    <div class="card-body">
                                        <table  class="table" id="subinnerCategory">
                                            <thead>
                                                <tr>

                                                    <th> Inner Category Name</th>
                                                      <th> Sub Category Name</th>
                                                    <th class="nosort">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody class="subinnerCategoryData">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="loader"></div>
                        <?php include "footer.php"; ?>
                      </div>
                  </div>

                </div>
                </div>


               <?php include "dashboardmodal.php"; ?>

                <script src="js/jquery.min.js"></script>
                <script src="jscode/loader.js"></script>
                <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
                <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
                <script src="plugins/screenfull/dist/screenfull.js"></script>
                <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
                <script src="dist/js/theme.min.js"></script>
                <script src="js/datatables.js"></script>
                <script src="plugins/moment/moment.js"></script>
                <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
                <script src="plugins/summernote/dist/summernote-bs4.min.js"></script>
                <script src="js/layouts.js"></script>
                <script src="plugins/select2/dist/js/select2.min.js"></script>
                <script src="jscode/apis.js"></script>
                <!-- <script src="jscode/getallcategory1.js"></script> -->
                <script src="jscode/undefinedsubcategory.js"></script>
                <script src="jscode/getallsubCategory.js"></script>
                <script src="jscode/getallinnersubCategory.js"></script>
                <script src="jscode/innersubCategory.js"></script>

    </body>

</html>
<?php
}else{
    header('Location:index.php');
}
?>
