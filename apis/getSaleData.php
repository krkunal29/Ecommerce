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
        $sql      = "SELECT SUM(tm.totalcost) sale FROM transaction_master tm GROUP BY MONTH(tm.invDate)";
    }else{
        $sql      = "SELECT SUM(tm.totalcost) sale FROM transaction_master tm  WHERE tm.userId = $userId GROUP BY MONTH(tm.invDate)";
    }
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while($academicResults = mysqli_fetch_assoc($jobQuery)){
            $records[] = $academicResults;
        }  
        $response = array(
            'Message' => "All Sales Data Fetched successfully",
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
        'Message' => "Parameter missing",
        "Data" => $records,
        'Responsecode' => 401
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>
