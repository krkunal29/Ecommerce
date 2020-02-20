<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['roleId']) && isset($_POST['userId'])){
    $sql = '';
    if($roleId == 1){
$sql      = "SELECT SUM(td.Quantity) Quantity,sum(td.rate*td.Quantity) Sale,COUNT(tm.transactionId) inv 
FROM transaction_details td INNER JOIN transaction_master tm ON tm.transactionId = td.transaction_id 
WHERE tm.isReturn = 0 AND tm.invDate = CURRENT_DATE() - INTERVAL 1 DAY";
    }else{
        $sql = "SELECT SUM(td.Quantity) Quantity,sum(td.rate*td.Quantity) Sale,COUNT(tm.transactionId) inv 
        FROM transaction_details td INNER JOIN transaction_master tm ON tm.transactionId = td.transaction_id 
        WHERE tm.isReturn = 0 AND tm.invDate = CURRENT_DATE() - INTERVAL 1 DAY AND tm.userId = $userId";
    }

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
}else{
    $response = array(
        'Message' => 'Parameter Missing',
        "Data" => $records,
        'Responsecode' => 407
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>