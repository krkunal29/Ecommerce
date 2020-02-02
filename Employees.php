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
        <link rel="stylesheet" href=" plugins/summernote/dist/summernote-bs4.css">
        <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="dist/css/dropzone.css">
        <link rel="stylesheet" href="dist/css/style.css">
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
                                            <h5>Employees</h5>
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
                                                <a href="index.php">Home</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Employees</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div id="newcustomer"></div>
                        <div class="row customerlist">
                        <div class="col-md-12">
                                <div class="card table-card">
                                    <div class="card-header">
                                      <div class="col-md-12">
                                        <div class="row">
                                          <div class="col-sm-4">
                                            <h3>Employees List</h3>
                                          </div>
                                          <div class="col-sm-4">

                                          </div>
                                          <div class="col-sm-4">
                                            <button type="button" class="btn btn-primary" style="float: right;" onclick="addCustomer();" >New Employee</button>
                                          </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0" id="users">
                                                <thead>
                                                    <tr>
                                                        <th>Brand</th>
                                                        <th>Customer</th>
                                                        <th>Contact Number</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="usersData">
                                                </tbody>
                                            </table>
                                        </div>
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

      <script src="js/jquery.min.js"></script>
        <script src="jscode/loader.js"></script>
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/dropzone.js"></script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>

        <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/summernote/dist/summernote-bs4.min.js"></script>
        <script src="dist/js/theme.min.js"></script>
        <script src="js/datatables.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="plugins/select2/dist/js/select2.min.js"></script>

        <script src="jscode/apis.js"></script>
        <script src="jscode/employee.js"></script>
    <script>
    var data = {
        userId:<?php echo $_SESSION['userId'];?>,
        roleId:<?php echo $_SESSION['roleId'];?>
    };
    loadUsers(3);
    </script>
    </body>
</html>
<?php
}
else{
    header('Location:index.php');
}
?>
