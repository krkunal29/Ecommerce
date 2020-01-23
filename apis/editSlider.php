<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
extract($_POST);
if(isset($_POST['sliderId']) && isset($_POST['sliderTitle'])  && isset($_FILES["imgname"]["type"])){

    $sliderTitle = mysqli_real_escape_string($conn,$sliderTitle);
   
    if(isset($_FILES["imgname"]["type"])){
        $imgname = $_FILES["imgname"]["name"];
        $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = "slider/".$sliderId.".jpg"; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
      }
    $query = "UPDATE slider SET sliderTitle='$sliderTitle' WHERE Id = $sliderId";
    $jobQuery = mysqli_query($conn,$query);
    $rowsAffected=mysqli_affected_rows($conn);

if($rowsAffected==1)
    {
      $sql       = "SELECT * FROM slider WHERE Id = $sliderId";
      $jobQuery1 = mysqli_query($conn, $sql);
      if ($jobQuery1 != null) {
          $academicAffected = mysqli_num_rows($jobQuery1);
          if ($academicAffected > 0) {
              $academicResults = mysqli_fetch_assoc($jobQuery1);
              $records      = $academicResults;
              $response        = array(
                  'Message' => "Slider Details updated successfully",
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

    }else{
        $response = array('Message'=>'Only Image Upload',"Data"=>$records ,'Responsecode'=>403);
    }
}else{
    $response = array('Message'=>"Parameter Missing" ,'Responsecode'=>500);
}
mysqli_close($conn);
exit(json_encode($response));
?>
