<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['fromDate']) && isset($_POST['uptoDate'])) {
    $sql = "SELECT tm.transactionId,tm.t_type,DATE_FORMAT(tm.invDate,'%d,%M %Y') invDate,tm.discount,tm.remark,tm.createdBy,tm.createdAt,SUM(td.Quantity * td.rate) AS amount,COALESCE(ud.fname,'') AS c_name,COALESCE(ud.lname,'') AS c_lname,
COALESCE(ut.fname,'') fname,coalesce(ut.lname,'') lname
FROM transaction_master tm INNER JOIN transaction_details td ON tm.transactionId = td.transaction_id LEFT JOIN user_details ud ON ud.userId = tm.createdBy LEFT JOIN user_details ut ON ut.userId = tm.userId 
WHERE tm.invDate BETWEEN '$fromDate' AND '$uptoDate' GROUP BY tm.transactionId";
    if (!empty($_POST['userId'])) {
        $sql = "SELECT tm.transactionId,tm.t_type,DATE_FORMAT(tm.invDate,'%d,%M %Y') invDate,tm.discount,tm.remark,tm.createdBy,tm.createdAt,SUM(td.Quantity * td.rate) AS amount,COALESCE(ud.fname,'') AS c_name,COALESCE(ud.lname,'') AS c_lname,
    COALESCE(ut.fname,'') fname,coalesce(ut.lname,'') lname
    FROM transaction_master tm INNER JOIN transaction_details td ON tm.transactionId = td.transaction_id LEFT JOIN user_details ud ON ud.userId = tm.createdBy LEFT JOIN user_details ut ON ut.userId = tm.userId 
    WHERE tm.invDate BETWEEN '$fromDate' AND '$uptoDate' AND tm.createdBy = $userId GROUP BY tm.transactionId";
        
    }
    $jobQuery = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
                $records[] = $academicResults;
            }
            
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
    } else {
        $response = array(
            'Message' => "Parameter Missing",
            'sql'=>$sql,
            'Responsecode' => 406
        );
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        'Responsecode' => 404
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>