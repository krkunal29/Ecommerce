<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response=null;
$records = null;
extract($_POST);
if (isset($_POST['subcategoryid']) && isset($_POST['category']) && isset($_POST['categoryId'])) {
    $sql = "UPDATE lastsubcategorymaster SET lastsubcategoryName='$category',innersubcategoryId='$categoryId' WHERE lastsubcategoryId = $subcategoryid";
    $query = mysqli_query($conn,$sql);
					$rowsAffected=mysqli_affected_rows($conn);
						if($rowsAffected > 0)
						{
              // $last_id = mysqli_insert_id($conn);
              // $s = strval($last_id);
              $sql1 = "SELECT lscm.lastsubcategoryId,lscm.lastsubcategoryName,
              lscm.innersubcategoryId,
            iscm.innersubcategoryName
            FROM lastsubcategorymaster lscm LEFT JOIN innersubcategorymaster iscm ON
            lscm.innersubcategoryId =iscm.innersubcategoryId
               WHERE lscm.lastsubcategoryId= $subcategoryid";
              $jobQuery1 = mysqli_query($conn,$sql1);
              if ($jobQuery1 != null) {
                  $academicAffected = mysqli_num_rows($jobQuery1);
                  if ($academicAffected > 0) {
                      $academicResults = mysqli_fetch_assoc($jobQuery1);
                      $records       = $academicResults;
                $response = array(
                    'Message' => "Last Sub Category Updated Successfully",
                    "Data" => $records,
                    'Responsecode' => 200
                );
              }

            }
						}
						else
						{
							$response=array("Message"=> mysqli_error($conn)."No data to change or user not present","Responsecode"=>500);
						}
}
else
{
		    $response = array('Message' => "Parameter missing", 'Responsecode' => 402);
}
mysqli_close($conn);
exit(json_encode($response));
?>
