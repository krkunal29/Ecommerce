<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response=null;
$records = null;
extract($_POST);
if (isset($_POST['subcategoryid']) && isset($_POST['category']) && isset($_POST['categoryId'])) {
    $sql = "UPDATE innersubcategorymaster SET innersubcategoryName='$category',subcategoryId='$categoryId' WHERE innersubcategoryId = $subcategoryid";
    $query = mysqli_query($conn,$sql);
					$rowsAffected=mysqli_affected_rows($conn);
						if($rowsAffected > 0)
						{
              // $last_id = mysqli_insert_id($conn);
              // $s = strval($last_id);
              $sql1 = "SELECT iscm.innersubcategoryId,iscm.innersubcategoryName,iscm.subcategoryId,
              scm.subcategoryName from innersubcategorymaster iscm
               LEFT JOIN subcategorymaster scm ON scm.subcategoryId =iscm.subcategoryId
               WHERE iscm.innersubcategoryId =  $subcategoryid";
              $jobQuery1 = mysqli_query($conn,$sql1);
              if ($jobQuery1 != null) {
                  $academicAffected = mysqli_num_rows($jobQuery1);
                  if ($academicAffected > 0) {
                      $academicResults = mysqli_fetch_assoc($jobQuery1);
                      $records       = $academicResults;
                $response = array(
                    'Message' => "Inner Sub Category Updated Successfully",
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
