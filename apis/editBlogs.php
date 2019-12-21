<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
extract($_POST);
if(isset($_POST['blogId']) && isset($_POST['blogTitle']) && isset($_POST['blogContent']) && isset($_POST['categoryId']) && isset($_POST['blogStatus']) && isset($_POST['blogUrl'])){

    $blogTitle = mysqli_real_escape_string($conn,$blogTitle);
    $blogContent =  mysqli_real_escape_string($conn,$blogContent);
    $blogUrl = mysqli_real_escape_string($conn,$blogUrl);

    $query = "UPDATE blogmaster SET blogTitle='$blogTitle',blogContent='$blogContent',categoryId=$categoryId,blogStatus='$blogStatus',blogUrl='$blogUrl' WHERE blogId = $blogId";
    $jobQuery = mysqli_query($conn,$query);
    $rowsAffected=mysqli_affected_rows($conn);
    if(isset($_FILES["imgname"]["type"])){
        $imgname = $_FILES["imgname"]["name"];
        $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = "blog/".$blogId.".jpg"; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
      }
if($rowsAffected==1)
    {
      $sql       = "SELECT * FROM blogmaster bm LEFT JOIN blogcategory bg ON bm.categoryId = bg.categoryId WHERE bm.blogId = $blogId";
      $jobQuery1 = mysqli_query($conn, $sql);
      if ($jobQuery1 != null) {
          $academicAffected = mysqli_num_rows($jobQuery1);
          if ($academicAffected > 0) {
              $academicResults = mysqli_fetch_assoc($jobQuery1);
              $records[]       = $academicResults;
              $response        = array(
                  'Message' => "Blogs updated successfully",
                  "Data" => $records,
                  'Responsecode' => 200
              );
          } else {
              $response = array(
                  'Message' => "Please Add data first",
                  "Data" => $records,
                  'Responsecode' => 300
              );
          }
      }
        // $response = array('Message'=>"Blogs updated successfully","Data"=>$records ,'Responsecode'=>200);

    }else{
        $response = array('Message'=>mysqli_error($conn).'Failed',"Data"=>$records ,'Responsecode'=>403);
    }
}else{
    $response = array('Message'=>"Parameter Missing" ,'Responsecode'=>500);
}
mysqli_close($conn);
exit(json_encode($response));
?>
