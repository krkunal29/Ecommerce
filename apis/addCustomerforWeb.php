<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "../refferCode.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['fname']) && isset($_POST['contactNumber'])) {
    $refferalCode = random_strings(6);
    $sql   = "INSERT INTO  customer_master(custName,contactNumber,refferalCode) VALUES('$fname','$contactNumber','$refferalCode')";
    $query = mysqli_query($conn, $sql);

    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $userId       = $conn->insert_id;
     
        $response = array(
            'Message' => "Welcome to kissan agro now you can login using your contact number",
            'Responsecode' => 200
        );
    }
                else{
                    $response = array(
                        'Message' => mysqli_error($conn)."Contact Number already exists",
                        'Responsecode' => 209
                    );
                }
            } else {
    $response = array(
        "Message" => "Parameters missing",
        "Responsecode" => 403
    );
}
mysqli_close($conn);
print json_encode($response);
?>
