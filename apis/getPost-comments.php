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
$result_1 = null;
$query = "SELECT cm.contactNumber, cm.custName,up.postId,up.userId,up.postTitle,up.postContent ,up.postUrl,DATE_FORMAT(up.createdAt,'%d %b,%Y') blogDate,
DATE_FORMAT(up.createdAt,'%T') postTime,COUNT(pc.commentId) as numberOfcomments
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
            $like = 0;
            $result_1 = null;
            $result = array('comments'=>$temp);
            $result_1 = array('Likes'=>$like);
            $postId = $academicResults['postId'];
            $sql = "SELECT pc.commentId,pc.postId,pc.commentText,DATE_FORMAT(pc.createdAt,'%d %b') comDate,DATE_FORMAT(pc.createdAt,'%T') comTime,COALESCE(cm.custName,'admin') custName,pc.userId
            FROM post_comments pc LEFT JOIN customer_master cm ON cm.customerId = pc.userId WHERE pc.postId = $postId ORDER BY pc.commentId DESC";
            $jobQuery_1 = mysqli_query($conn,$sql);
            $academicAffected_1=mysqli_num_rows($jobQuery_1);

            //likes count
            $sql_2 = "SELECT COUNT(likeId) likes FROM like_posts WHERE postId = $postId GROUP BY postId";
            $jobQuery_2 = mysqli_query($conn,$sql_2);
            $academicAffected_2=mysqli_num_rows($jobQuery_2);
            if($academicAffected_2>0)
            {
               $academicResults_2 = mysqli_fetch_assoc($jobQuery_2);
               $like = $academicResults_2;
               $result_1 = array('Likes'=>$like);
            }
        if($academicAffected_1>0)
		{
            while($academicResults_1 = mysqli_fetch_assoc($jobQuery_1)){
                $temp[] = $academicResults_1;
            }
            $result = array('comments'=>$temp);
        }
        $records[] = array_merge($academicResults,$result,$result_1);
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