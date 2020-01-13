<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['userId'])) {
    $sql   = "UPDATE user_master SET isActive = (CASE isActive WHEN 0 THEN 1 WHEN 1 THEN 0 END) WHERE userId = $userId";
    $query = mysqli_query($conn, $sql);
    $affectedrows = mysqli_affected_rows($conn);
    if ($affectedrows == 1 ) {
        $response = array(
            'Message' => "Inactive Customer successfully",
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