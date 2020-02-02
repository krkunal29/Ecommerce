<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response=null;
$records = null;
extract($_POST);
if (isset($_POST['sublastCategoryId']) ) {
    $sql = "DELETE FROM `lastsubcategorymaster` WHERE `lastsubcategoryId` = $sublastCategoryId";
				$query = mysqli_query($conn,$sql);
					if($query==1)
					{
					  			$response = array('Message'=>"Delete Last Sub Category successfully",'Responsecode'=>200);
					}
					else
					{
						$response=array("Message"=> mysqli_error($conn)." failed","Responsecode"=>500);
					}
}
else
{
		    $response = array('Message' => "Parameter missing",'Responsecode' => 402);
}
mysqli_close($conn);
exit(json_encode($response));
?>
