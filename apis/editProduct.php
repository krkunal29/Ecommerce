<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['productId']) && isset($_POST['productName']) && isset($_POST['unitId']) && isset($_POST['description']) && isset($_POST['salePrice']) && isset($_POST['Quantity'])) {
    $hsn          = isset($_POST['hsn']) ? $hsn : "NULL";
    $sku          = isset($_POST['sku']) ? $sku : "NULL";
    $categoryId   = isset($_POST['categoryId']) ? $categoryId : "NULL";
    $displayPrice = isset($_POST['displayPrice']) ? $displayPrice : "NULL";
    $TaxId        = isset($_POST['TaxId']) ? $TaxId : "NULL";
    $subcategoryId     = isset($_POST['subcategoryId']) ? $subcategoryId : "NULL";
    $innersubcategoryId= isset($_POST['innersubcategoryId']) ? $innersubcategoryId : "NULL";
    $lastsubcategoryId= isset($_POST['lastsubcategoryId']) ? $lastsubcategoryId : "NULL";
    $pexpiryDate= isset($_POST['pexpiryDate']) ? $pexpiryDate : "NULL";

    $productName = mysqli_real_escape_string($conn, $productName);
    $description = mysqli_real_escape_string($conn, $description);
    $salePrice   = mysqli_real_escape_string($conn, $salePrice);
    $Quantity    = mysqli_real_escape_string($conn, $Quantity);

    $query        = "UPDATE product_master pm LEFT JOIN productdetails pd ON (pm.productId = pd.productId)
    SET pm.productName = '$productName',pm.SKU='$sku',pm.HSN='$hsn',pm.unitId=$unitId,pm.categoryId=$categoryId,pm.subcategoryId = '$subcategoryId',
    pm.innersubcategoryId = '$innersubcategoryId',pm.lastsubcategoryId = '$lastsubcategoryId',pm.expiryDate = '$pexpiryDate',
    pm.description='$description',
    pd.TaxId = '$TaxId', pd.salePrice = '$salePrice',pd.displayPrice = '$displayPrice',pd.Quantity = '$Quantity'
    WHERE pm.productId = $productId";
   
    $jobQuery     = mysqli_query($conn, $query);
    $rowsAffected = mysqli_affected_rows($conn);
    if(isset($_FILES["imgname"]["type"])){
        $imgname = $_FILES["imgname"]["name"];
        $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = "upload/".$productId.".jpg"; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
      }
    if ($rowsAffected == 1) {
        $academicQuery = mysqli_query($conn, "SELECT * FROM product_master pm INNER JOIN productdetails pd ON pm.productId = pd.productId  where pm.productId = $productId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Products updated successfully",
            "Data" => $records,
            'Responsecode' => 200
        );

    } else {
        $response = array(
            'Message' => "No Data change".mysqli_error($conn),
            "Data" => $records,
            "sql"=> $query ,
            'Responsecode' => 403
        );
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        'Responsecode' => 500
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>
