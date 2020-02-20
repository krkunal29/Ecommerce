<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
$query = "SELECT bc.categoryId, bc.category,COUNT(bm.blogId) bcount FROM blogcategory bc
 LEFT JOIN blogmaster bm ON bm.categoryId = bc.categoryId GROUP BY bc.categoryId";
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
            $response = array('Message'=>"All Category Data fetched Successfully","Data"=>$records ,'Responsecode'=>200); 
		}else{
            $response = array('Message'=>"Please Add data first","Data"=>$records ,'Responsecode'=>200); 
        }
	}else{
        $response = array('Message'=>mysqli_error($conn),"Data"=>$records ,'Responsecode'=>403);
    }
mysqli_close($conn);
exit(json_encode($response));
?>