<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['productId'])) {
    $query      = "SELECT prI.imageId, pm.productName,pm.description,pd.salePrice,pd.displayPrice,pd.Quantity,cm.category
     FROM product_master pm 
    LEFT JOIN productdetails pd ON pm.productId = pd.productId LEFT JOIN category_master cm ON cm.categoryId = pm.categoryId
    LEFT JOIN productImages prI ON prI.productId = pm.productId
    WHERE pm.productId =  $productId";
    $jobQuery = mysqli_query($conn, $query);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
           while($academicResults = mysqli_fetch_assoc($jobQuery)){
            $records[]       = $academicResults;
           }
            $response        = array(
                'Message' => "All Product Data fetched Successfully",
                "Data" => $records,
                'Responsecode' => 200
            );
        } else {
            $response = array(
                'Message' => "No User Posts available",
                "Data" => $records,
                'Responsecode' => 205
            );
        }
    } else {
        $response = array(
            'Message' => mysqli_error($conn),
            "Data" => $records,
            'Responsecode' => 403
        );
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        "Data" => $records,
        'Responsecode' => 205
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>