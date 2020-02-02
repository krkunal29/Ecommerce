<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
$query = null;
$comments = null;
$temp = null;
$query = "SELECT cm.custName,up.postId,up.userId,up.postTitle,up.postContent ,up.postUrl,DATE_FORMAT(up.createdAt,'%d %b,%Y') blogDate,DATE_FORMAT(up.createdAt,'%T') postTime,
COUNT(pc.commentId) as numberOfcomments 
FROM user_posts up 
LEFT JOIN post_comments pc ON pc.postId = up.postId 
LEFT JOIN customer_master cm ON cm.customerId = up.userId
GROUP BY up.postId ORDER BY up.postId DESC";
$jobQuery = mysqli_query($conn,$query);
if($jobQuery!=null)
    {
	$academicAffected=mysqli_num_rows($jobQuery);
	 if($academicAffected>0)
		{
	    while($academicResults = mysqli_fetch_assoc($jobQuery)){
            $temp = null;
            $result = array('comments'=>$temp);
            $postId = $academicResults['postId'];
            $sql = "SELECT pc.commentId,pc.postId,pc.commentText,DATE_FORMAT(pc.createdAt,'%d %b') comDate,DATE_FORMAT(pc.createdAt,'%T') comTime,cm.custName,pc.userId
            FROM post_comments pc INNER JOIN customer_master cm ON cm.customerId = pc.userId WHERE pc.postId = $postId ORDER BY pc.commentId DESC";
            $jobQuery_1 = mysqli_query($conn,$sql);
            $academicAffected_1=mysqli_num_rows($jobQuery_1);
        if($academicAffected_1>0)
		{
            while($academicResults_1 = mysqli_fetch_assoc($jobQuery_1)){
                $temp[] = $academicResults_1;
            }
            $result = array('comments'=>$temp);
        }
        $records[] = array_merge($academicResults,$result);
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