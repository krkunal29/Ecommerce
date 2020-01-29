<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "../refferCode.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['custName']) && isset($_POST['contactNumber'])&& isset($_POST['custState']) && isset($_POST['custCity']) && isset($_POST['pincode'])  && isset($_POST['billingAddress'])) {

    $alternateContact     = isset($_POST['alternateContact']) ? $_POST['alternateContact'] : 'NULL';
    $alternateContact1   = isset($_POST['alternateContact1']) ? $_POST['alternateContact1'] : 'NULL';

    $peek     = isset($_POST['peek']) ? $_POST['peek'] : 'NULL';
    $custState     = isset($_POST['custState']) ? $_POST['custState'] : 'NULL';
    $custCity     = isset($_POST['custCity']) ? $_POST['custCity'] : 'NULL';
    $pincode     = isset($_POST['pincode']) ? $_POST['pincode'] : 'NULL';
    $water     = isset($_POST['water']) ? $_POST['water'] : 'NULL';
    $shippingAddress   = isset($_POST['shippingAddress']) ? $_POST['shippingAddress'] : 'NULL';

    $shippingAddress = mysqli_real_escape_string($conn, $shippingAddress);
    $billingAddress = mysqli_real_escape_string($conn, $billingAddress);
    $custName          = mysqli_real_escape_string($conn, $custName);

    $refferalCode = random_strings(6);
     $sql   = "INSERT INTO customer_master (custName,contactNumber,alternateContact, alternateContact1, peek,billingAddress,
     shippingAddress, custState,custCity,pincode, water,refferalCode)
      VALUES('$custName','$contactNumber','$alternateContact','$alternateContact1','$peek','$billingAddress',
     '$shippingAddress', $custState,$custCity,'$pincode','$water','$refferalCode')";
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $userId       = $conn->insert_id;
        if(isset($_FILES["imgname"]["type"])){
            $imgname = $_FILES["imgname"]["name"];
            $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "customer/". $userId.".jpg"; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
          }
          $sql   = "SELECT cm.custState,cm.custCity city,cm.customerId,cm.custName,cm.contactNumber,cm.alternateContact,
          cm.alternateContact1,cm.peek,cm.billingAddress,cm.shippingAddress,st.name stateName,ct.name custCity,cm.pincode,cm.water,cm.refferalCode
           FROM customer_master cm LEFT JOIN states st ON st.id = cm.custState LEFT JOIN cities ct ON ct.id = cm.custCity  WHERE cm.customerId=$userId";
            $academicQuery = mysqli_query($conn,$sql);
            if ($academicQuery != null) {
                $academicAffected = mysqli_num_rows($academicQuery);
                if ($academicAffected > 0) {
                    $academicResults = mysqli_fetch_assoc($academicQuery);
                    $records         = $academicResults;
                }
            }
            $response = array(
                'Message' => "User added Successfully",
                "Data" => $records,
                'Responsecode' => 200
            );

        }
        else {
            $response = array(
                "Message" => mysqli_error($conn),
                "Responsecode" => 402
            );

    }
  }  else {
    $response = array(
        "Message" => "Parameters missing",
        "Responsecode" => 404
    );
}
mysqli_close($conn);
print json_encode($response);
?>
