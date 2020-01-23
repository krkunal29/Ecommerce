<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['sliderTitle']) && isset($_FILES["imgname"]["type"])) {

    $sliderTitle   = mysqli_real_escape_string($conn, $sliderTitle);

    $query    = "INSERT INTO slider(sliderTitle) VALUES('$sliderTitle')";
    $jobQuery = mysqli_query($conn, $query);
    if ($jobQuery == 1) {
        $last_id = mysqli_insert_id($conn);
        $s       = strval($last_id);
        if(isset($_FILES["imgname"]["type"])){
            $imgname = $_FILES["imgname"]["name"];
            $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "slider/". $s.".jpg"; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
          }
        $sql       = "SELECT * FROM slider  WHERE Id = $s";
        $jobQuery1 = mysqli_query($conn, $sql);
        if ($jobQuery1 != null) {
            $academicAffected = mysqli_num_rows($jobQuery1);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($jobQuery1);
                $records      = $academicResults;
                $response        = array(
                    'Message' => "All Blogs Data Added Successfully",
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
        } else {
            $response = array(
                'Message' => "Refresh a page",
                "Data" => $records,
                'Responsecode' => 301
            );
        }

    } else {
        $response = array(
            'Message' => mysqli_error($conn),
            "Data" => $records,
            'Responsecode' => 403
        );
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        'Responsecode' => 500
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>
