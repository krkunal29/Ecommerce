<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$sql      = "SELECT SUM(Quantity) Quantity,SUM(Sale) Sale,SUM(inv) inv FROM(
    SELECT SUM(Quantity) Quantity,sum(rate*Quantity) Sale,0 inv FROM transaction_details
    UNION
    SELECT 0 Quantity,0 Sale, COUNT(tm.transactionId) inv FROM transaction_master tm
        ) as T";

$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        $academicResults = mysqli_fetch_assoc($jobQuery);
            $records = $academicResults;
        

        $response = array(
            'Message' => "All Users Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No user present/ Invalid username or password",
            "Data" => $records,
            'Responsecode' => 401
        );
    }
}else{
    $response = array(
        'Message' => mysqli_error($conn),
        "Data" => $records,
        'Responsecode' => 404
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>
