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
$sql      = "SELECT SUM(today) today,SUM(yester) yester,SUM(mon) mon,SUM(yer) yer FROM(
    SELECT COUNT(tm.transactionId) today,0 yester,0 mon,0 yer
    FROM transaction_master tm  WHERE tm.isReturn = 1 AND DATE(tm.updatedAt) = CURRENT_DATE()
    UNION
    SELECT 0 today,COUNT(tm.transactionId) yester,0 mon,0 yer
    FROM  transaction_master tm 
    WHERE tm.isReturn = 1 AND DATE(tm.updatedAt) = CURRENT_DATE() - INTERVAL 1 DAY
        UNION
        SELECT  0 today,0 yester,COUNT(tm.transactionId) mon,0 yer
    FROM transaction_master tm WHERE tm.isReturn = 1 AND
    MONTH(DATE(tm.updatedAt)) = MONTH(CURRENT_DATE())
    UNION
    SELECT  0 today,0 yester,0 mon,COUNT(tm.transactionId) yer
    FROM transaction_master tm
    WHERE tm.isReturn = 1 AND YEAR(tm.invDate) = YEAR(CURRENT_DATE())
    ) T";
    }else{
        $sql = "SELECT SUM(today) today,SUM(yester) yester,SUM(mon) mon,SUM(yer) yer FROM(
            SELECT COUNT(tm.transactionId) today,0 yester,0 mon,0 yer
            FROM transaction_master tm  WHERE tm.isReturn = 1 AND DATE(tm.updatedAt) = CURRENT_DATE() AND tm.userId = $userId
            UNION
            SELECT 0 today,COUNT(tm.transactionId) yester,0 mon,0 yer
            FROM  transaction_master tm 
            WHERE tm.isReturn = 1 AND DATE(tm.updatedAt) = CURRENT_DATE() - INTERVAL 1 DAY AND tm.userId = $userId
                UNION
                SELECT  0 today,0 yester,COUNT(tm.transactionId) mon,0 yer
            FROM transaction_master tm WHERE tm.isReturn = 1 AND
            MONTH(DATE(tm.updatedAt)) = MONTH(CURRENT_DATE()) AND tm.userId = $userId
            UNION
            SELECT  0 today,0 yester,0 mon,COUNT(tm.transactionId) yer
            FROM transaction_master tm
            WHERE tm.isReturn = 1 AND YEAR(tm.invDate) = YEAR(CURRENT_DATE()) AND tm.userId = $userId
            ) T";
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