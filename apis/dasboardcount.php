<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;



$query = "SELECT  (
        SELECT COUNT(*)
        FROM   blogmaster
        ) AS blogcount,
        (
        SELECT COUNT(*)
        FROM   product_master
        ) AS productcount,
        (
        SELECT COUNT(*)
        FROM   category_master
        ) AS  categorycount,
        (
        SELECT COUNT(*)
        FROM   subcategorymaster
        ) AS subcatcount,
        (
        SELECT COUNT(*)
        FROM   taxmaster
        ) AS  taxcount,
        (
        SELECT COUNT(*)
        FROM  blogcategory
        ) AS blogcatcount,
        (
        SELECT COUNT(*)
        FROM   unit_master
        ) AS  unitcount,
        (
        SELECT COUNT(*)
        FROM  user_master
        ) AS usercount
FROM    dual";
$jobQuery = mysqli_query($conn,$query);
if($jobQuery!=null)
    {
	$academicAffected=mysqli_num_rows($jobQuery);
	 if($academicAffected>0)
		{
		while($academicResults = mysqli_fetch_assoc($jobQuery))
				{
					$records=$academicResults;
                }
            $response = array('Message'=>"All Dashboard Count Fetch Successfully","Data"=>$records ,'Responsecode'=>200);
		}else{
            // $response = array('Message'=>"Please Add data first","Data"=>$records ,'Responsecode'=>200);
        }
	}else{
        $response = array('Message'=>mysqli_error($conn),"Data"=>$records ,'Responsecode'=>403);
    }
mysqli_close($conn);
exit(json_encode($response));
?>
