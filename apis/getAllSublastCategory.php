<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
extract($_POST);
$query = null;
if(isset($_POST['lastcategoryId'])){
	$query = "SELECT * FROM `lastsubcategorymaster` WHERE `innersubcategoryId`= $lastcategoryId ";
}else{
	$query = "SELECT lscm.lastsubcategoryId,lscm.lastsubcategoryName,
  lscm.innersubcategoryId,
iscm.innersubcategoryName
FROM lastsubcategorymaster lscm LEFT JOIN innersubcategorymaster iscm ON
lscm.innersubcategoryId =iscm.innersubcategoryId ";
}
// $query = "SELECT scm.subcategoryId,scm.subcategoryName,scm.categoryId,cm.category	from subcategorymaster scm LEFT JOIN category_master cm ON scm.categoryId =cm.categoryId";
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
            $response = array('Message'=>"All Last Category Data fetched Successfully","Data"=>$records ,'Responsecode'=>200);
		}else{
            $response = array('Message'=>"Please Add data first","Data"=>$records ,'Responsecode'=>203);
        }
	}else{
        $response = array('Message'=>mysqli_error($conn),"Data"=>$records ,'Responsecode'=>403);
    }
mysqli_close($conn);
exit(json_encode($response));
?>
