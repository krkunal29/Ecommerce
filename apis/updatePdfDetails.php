<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['firm']) && isset($_POST['contactNumber']) && isset($_POST['acontactNumber']) && isset($_POST['dAddress']) && isset($_POST['gstn'])) {

    $firm   = mysqli_real_escape_string($conn, $firm);
    $dAddress = mysqli_real_escape_string($conn, $dAddress);
    $gstn     = mysqli_real_escape_string($conn, $gstn);
    $query    = "UPDATE firmdetails SET firm = '$firm',contactnumber='$contactNumber', acontactNumber='$acontactNumber',dAddress='$dAddress',
    gstn = '$gstn' WHERE firmId = 1";
    $jobQuery = mysqli_query($conn, $query);
    $academic = mysqli_affected_rows($conn);
    if ($academic== 1) {
        $response = array(
            'Message' => 'Details Updated Successfully',
            'Responsecode' => 200
        );

    } else {
        $response = array(
            'Message' => mysqli_error($conn),
            'Responsecode' => 403
        );
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        'Responsecode' => 500
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>
