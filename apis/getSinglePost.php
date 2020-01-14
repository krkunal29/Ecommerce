<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
$query = null;
$comments = null;
extract($_POST);
if(isset($_POST['postId'])){
    $query = "SELECT ud.fname,ud.lname,up.postId,up.userId,up.postTitle,up.postContent,up.postUrl,DATE_FORMAT(up.createdAt,'%d %b,%Y') blogDate,DATE_FORMAT(up.createdAt,'%T') postTime 
    FROM user_posts up 
    LEFT JOIN user_details ud ON ud.userId = up.userId WHERE up.postId = $postId";
$jobQuery = mysqli_query($conn,$query);
if($jobQuery!=null)
    {
	$academicAffected=mysqli_num_rows($jobQuery);
	 if($academicAffected>0)
		{
	    $academicResults = mysqli_fetch_assoc($jobQuery);
        $records = $academicResults;
        $sql = "SELECT pc.commentText,DATE_FORMAT(pc.createdAt,'%d %b,%Y') commentDate,DATE_FORMAT(pc.createdAt,'%T') commentTime,ud.fname,ud.lname  
        FROM post_comments pc LEFT JOIN user_details ud ON ud.userId = pc.userId WHERE pc.postId = $postId";
        $jobQuery1 = mysqli_query($conn,$sql);
        if($jobQuery1!=null)
            {
            $academicAffected1=mysqli_num_rows($jobQuery1);
             if($academicAffected1>0)
                {
                    while($academicResults1 = mysqli_fetch_assoc($jobQuery1)){
                        $comments[] = $academicResults1;
                    }
                   
                }
            }
        
        $response = array('Message'=>"All Post Data fetched Successfully","Data"=>$records ,"comments"=>$comments,'Responsecode'=>200); 
		}else{
            $response = array('Message'=>"No User Posts available","Data"=>$records ,'Responsecode'=>205); 
        }
	}else{
        $response = array('Message'=>mysqli_error($conn),"Data"=>$records ,'Responsecode'=>403);
    }
}else{
    $response = array('Message'=>"Parameter Missing","Data"=>$records ,'Responsecode'=>205); 
}
mysqli_close($conn);
exit(json_encode($response));
?>