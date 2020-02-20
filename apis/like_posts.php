<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
extract($_POST);
if(isset($_POST['postId']) && isset($_POST['userId'])){
    $query = "INSERT INTO like_posts(postId,userId) VALUES($postId,$userId)";
    $jobQuery = mysqli_query($conn,$query);
if($jobQuery==1)
    {
        $response = array('Message'=>'Liked',"Data"=>$records ,'Responsecode'=>200);

    }else{
        $response = array('Message'=>mysqli_error($conn),"Data"=>$records ,'Responsecode'=>403);
    }
}else{
    $response = array('Message'=>"Parameter Missing" ,'Responsecode'=>500);  
}
mysqli_close($conn);
exit(json_encode($response));
?>