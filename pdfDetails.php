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
                                                    <h5>Invoice Header Details</h5>
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
                                                        <a href="dashboard.php">Home</a>
                                                    </li>
                                                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   
                                <div class="row">

<div class="card">
    <div class="card-header">
        <h3>Add New Blog</h3></div>
    <div class="card-body">
        <form class="forms-sample" id="firmForm" method="POST">

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="productDesc">Firm</label>
                        <input type="text" class="form-control" name="firm" id="firm" placeholder="Enter Firm Title" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="productDesc">Contact Number</label>
                        <input type="text" class="form-control" name="contactNumber" id="contactNumber" placeholder="Enter Primary Contact" required>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="productDesc">Alternate Contact Number</label>
                        <input type="text" class="form-control" name="acontactNumber" id="acontactNumber" placeholder="Enter Primary Contact" >

                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                  <div class="form-group">
                      <label for="productDesc">Detail Address</label>
                      <textarea class="form-control" name="dAddress" id="dAddress" placeholder="Enter Detail Address" rows="4"></textarea>
                  </div>
              </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="productDesc">GST Number</label>
                        <input type="text" class="form-control" name="gstn" id="gstn" placeholder="Enter GST Number" >
                       
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
    </div>
</div>
</div>
                                </div>

                                <?php include "footer.php"; ?>
                            </div>
                        </div>
                </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/dropzone.js"></script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="plugins/summernote/dist/summernote-bs4.min.js"></script>
        <script src="dist/js/theme.min.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
       
        <script src="jscode/apis.js"></script>
        <script src="jscode/getPdf.js"></script>
        <script src="jscode/addPdf.js"></script>
        <script>
            var data = {
                userId: <?php echo $_SESSION['userId'];?>,
                roleId: <?php echo $_SESSION['roleId'];?>
            };
        </script>
    </body>
    </html>
    <?php
}
else{
    header('Location:index.php');
}
?>