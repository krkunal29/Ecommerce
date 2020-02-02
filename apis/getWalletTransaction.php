<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['userId'])) {
$sql   = "SELECT wm.wallet_amount,wt.tid,wt.t_type,wt.amount,wt.t_desc,wt.createdAt 
FROM wallet_master wm LEFT JOIN wallet_transaction wt ON wm.userId = wt.userId WHERE wm.userId  = $userId";
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