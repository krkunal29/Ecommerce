<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['userId'])) {
    $sql   = "DELETE FROM customer_master WHERE customerId = $userId";
    $query = mysqli_query($conn, $sql);
    $affectedrows = mysqli_affected_rows($conn);
    if ($affectedrows == 1 ) {
        $response = array(
            'Message' => "Customer removed successfully",
            'Responsecode' => 200
        );
    } else {
        $response = array(
            "Message" => mysqli_error($conn) . " failed",
            "Responsecode" => 500
        );
    }
} else {
    $response = array(
        'Message' => "Parameter missing",
        'Responsecode' => 402
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>