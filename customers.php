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

        <link href="plugins/bootstrap/dist/css/font.css" rel="stylesheet">
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
        <link rel="stylesheet" href="dist/css/jquery-ui.css">
        <link rel="stylesheet" href="plugins/bootstrap-tagsinput/dist/tagsinput.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
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
                                            <h5>Customers List</h5>
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
                                                <a href="#">Customers</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Customers</li>
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
                                            <h3>Customer List</h3>
                                          </div>
                                          <div class="col-sm-4">

                                          </div>
                                          <div class="col-sm-4">
                                            <button type="button" class="btn btn-primary" style="float: right;" onclick="addCustomer();" >New Customers</button>
                                          </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0" id="users">
                                                <thead>
                                                    <tr>
                                                        <th>Profile</th>
                                                        <th>Customer</th>
                                                        <th>Contact Number</th>
                                                        <th>Address</th>
                                                        <th></th>
                                                        <th>Refferal code</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="usersData">
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
      <script src="js/jquery-ui.min.js"></script>
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
        <script src="plugins/bootstrap-tagsinput/dist/tagsinput.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="plugins/select2/dist/js/select2.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="jscode/apis.js"></script>
        <script src="jscode/getallroles.js"></script>
        <script src="jscode/cities.js"></script>
        <script src="jscode/customers.js"></script>

        <script>
    var data = {
        userId:<?php echo $_SESSION['userId'];?>,
        roleId:<?php echo $_SESSION['roleId'];?>
    };
    loadUsers();

    </script>

    </body>
</html>
<?php
}
else{
    header('Location:index.php');
}
?>
