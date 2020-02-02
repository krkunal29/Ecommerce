<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response=null;
$records = null;
extract($_POST);
if (isset($_POST['contactNumber'])) {
    $query = "SELECT cm.customerId,cm.custName,cm.contactNumber FROM  customer_master cm WHERE cm.contactNumber ='$contactNumber'";
    $jobQuery = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected >0) {
            $academicResults = mysqli_fetch_assoc($jobQuery);
                $records = $academicResults;
                $response = array('Message' => "Login Successfully", "Data" => $records, 'Responsecode' => 200);
            }else{
                $response = array('Message' => "No user present/ Invalid contact number or password", "Data" => $records, 'Responsecode' => 402);
            }
        } else {
            $response = array('Message' => "No user present/ Invalid contact number or password", "Data" => $records, 'Responsecode' => 401);
        }
}else{
    $response = array('Message' => "Parameter Missing", "Data" => $records, 'Responsecode' => 500);
}
mysqli_close($conn);
print json_encode($response);
?>
