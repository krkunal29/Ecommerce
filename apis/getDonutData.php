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
        $sql      = "SELECT cm.category,pm.categoryId,COALESCE(SUM(td.rate*td.Quantity),0) point FROM category_master cm  LEFT JOIN product_master pm ON pm.categoryId = cm.categoryId 
LEFT JOIN transaction_details td ON td.productId = pm.productId GROUP BY cm.categoryId";
    }else{
        $sql      = "SELECT cm.category,pm.categoryId,COALESCE(SUM(td.rate*td.Quantity),0) point FROM category_master cm LEFT JOIN product_master pm ON pm.categoryId = cm.categoryId LEFT JOIN transaction_details td ON td.productId = pm.productId 
        LEFT JOIN transaction_master tm ON tm.transactionId = td.transaction_id 
        WHERE tm.userId = $userId 
        GROUP BY cm.categoryId ";
        // WHERE tm.userId = $userId 
    }
// echo $sql;
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while($academicResults = mysqli_fetch_assoc($jobQuery)){
            $records[] = $academicResults;
        }  
        $response = array(
            'Message' => "All Donuts Data Fetched successfully",
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
        'Message' => 'Parameter missing',
        'Responsecode' => 407
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>
