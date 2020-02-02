<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$sql      = "SELECT cm.custState,cm.custCity city,cm.customerId,cm.custName,cm.contactNumber,cm.alternateContact,
cm.alternateContact1,cm.peek,cm.billingAddress,cm.shippingAddress,st.name stateName,ct.name custCity,cm.pincode,cm.water,cm.refferalCode
 FROM customer_master cm LEFT JOIN states st ON st.id = cm.custState LEFT JOIN cities ct ON ct.id = cm.custCity";
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
}
mysqli_close($conn);
exit(json_encode($response));
?>
