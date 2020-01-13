<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
$query = "SELECT bm.blogId,bm.blogTitle,SUBSTR(bm.blogContent,1,100) as blogContent,bm.blogContent blog,bm.blogUrl,DATE_FORMAT(bm.createdAt,'%d %b,%Y') blogDate,bc.category 
FROM blogmaster bm INNER JOIN blogcategory bc ON bm.categoryId = bc.categoryId";
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
            $response = array('Message'=>"All Blogs Data fetched Successfully","Data"=>$records ,'Responsecode'=>200); 
		}else{
            $response = array('Message'=>"Please Add data first","Data"=>$records ,'Responsecode'=>200); 
        }
	}else{
        $response = array('Message'=>mysqli_error($conn),"Data"=>$records ,'Responsecode'=>403);
    }
mysqli_close($conn);
exit(json_encode($response));
?>