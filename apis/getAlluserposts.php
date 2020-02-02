<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
$query = null;
extract($_POST);
if(isset($_POST['userId'])){
    $query = "SELECT ud.fname,ud.lname,up.postId,up.userId,up.postTitle,up.postContent,up.postUrl,DATE_FORMAT(up.createdAt,'%d %b,%Y') blogDate,DATE_FORMAT(up.createdAt,'%T') postTime,
    COUNT(pc.commentId) as numberOfcomments 
    FROM user_posts up 
    LEFT JOIN post_comments pc ON pc.postId = up.postId 
    LEFT JOIN user_details ud ON ud.userId = up.userId WHERE up.userId = $userId
    GROUP BY up.postId" ;
}else{
$query = "SELECT ud.fname,ud.lname,up.postId,up.userId,up.postTitle,SUBSTR(up.postContent,1,100) postContent ,up.postUrl,DATE_FORMAT(up.createdAt,'%d %b,%Y') blogDate,DATE_FORMAT(up.createdAt,'%T') postTime,
COUNT(pc.commentId) as numberOfcomments 
FROM user_posts up 
LEFT JOIN post_comments pc ON pc.postId = up.postId 
LEFT JOIN user_details ud ON ud.userId = up.userId
GROUP BY up.postId ORDER BY up.postId";
}
$jobQuery = mysqli_query($conn,$query);
if($jobQuery!=null)
    {
	$academicAffected=mysqli_num_rows($jobQuery);
	 if($academicAffected>0)
		{
		while($academicResults = mysqli_fetch_assoc($jobQuery))
				{
					$records[]=$academicResults;
                }
            $response = array('Message'=>"All Post Data fetched Successfully","Data"=>$records ,'Responsecode'=>200); 
		}else{
            $response = array('Message'=>"No User Posts available","Data"=>$records ,'Responsecode'=>205); 
        }
	}else{
        $response = array('Message'=>mysqli_error($conn),"Data"=>$records ,'Responsecode'=>403);
    }
mysqli_close($conn);
exit(json_encode($response));
?>