<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['userId'])) {
$sql   = "SELECT tm.transactionId,tm.invDate,tm.discount,tm.remark,SUM(td.rate) AS total,tm.t_type
FROM transaction_master tm INNER JOIN transaction_details td ON td.transaction_id = tm.transactionId WHERE tm.customer_Id = $userId";
    $query = mysqli_query($conn, $sql);
    if ($query != null) {
        $academicAffected = mysqli_num_rows($query);
        if ($academicAffected > 0) {
            while ($academicResults = mysqli_fetch_assoc($query)) {
                $records[] = $academicResults;
            }
            $response = array(
                'Message' => 'All data fetch successfull',
                'Data' => $records,
                'Responsecode' => 200
            );
        } else {
            $response = array(
                'Message' => 'No Invoice Found',
                'Responsecode' => 204
            );
        }
    } else {
        $response = array(
            'Message' => 'Query has an error',
            'Responsecode' => 205
        );
    }
} else {
    $response = array(
        'Message' => 'Parameter Missing',
        'Responsecode' => 404
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>
