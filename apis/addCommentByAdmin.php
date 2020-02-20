<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
date_default_timezone_set("Asia/kolkata");
if (isset($_POST['postId']) && isset($_POST['commentText'])) {
    
    $commentText   = mysqli_real_escape_string($conn, $commentText);
   
    $query    = "INSERT INTO post_comments(postId,commentText) VALUES('$postId','$commentText')";
    $jobQuery = mysqli_query($conn, $query);
    if ($jobQuery == 1) {
        $last_id = mysqli_insert_id($conn);
        $s       = strval($last_id);
        $sql       = "SELECT pc.commentId,pc.postId,pc.commentText,DATE_FORMAT(pc.createdAt,'%d %b') comDate,DATE_FORMAT(pc.createdAt,'%T') comTime,pc.userId
        FROM post_comments pc   WHERE pc.commentId = $s";
        $jobQuery1 = mysqli_query($conn, $sql);
        if ($jobQuery1 != null) {
            $academicAffected = mysqli_num_rows($jobQuery1);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($jobQuery1);
                $records      = $academicResults;
                $response        = array(
                    'Message' => "All Comments Data fetched Successfully",
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