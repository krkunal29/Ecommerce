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
if(isset($_POST['blogId'])){
    $sql = "SELECT bm.blogTitle,bm.blogContent,bm.blogUrl,DATE_FORMAT(bm.createdAt,'%d %b,%Y') blogDate,bc.category 
        FROM blogmaster bm INNER JOIN blogcategory bc ON bm.categoryId = bc.categoryId WHERE bm.blogId = $blogId";
    
$jobQuery = mysqli_query($conn,$sql);
if($jobQuery!=null)
    {
	$academicAffected=mysqli_num_rows($jobQuery);
	 if($academicAffected>0)
		{
	    $academicResults = mysqli_fetch_assoc($jobQuery);
        $records = $academicResults;
          
        
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