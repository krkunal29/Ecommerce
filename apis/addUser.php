<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['roleId']) && isset($_POST['contactNumber']) && isset($_POST['emailId']) && isset($_POST['upassword']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['contactAddress'])) {

    $mname     = isset($_POST['mname']) ? $_POST['mname'] : 'NULL';
    $pincode   = isset($_POST['pincode']) ? $_POST['pincode'] : 'NULL';


    $Contactaddress = mysqli_real_escape_string($conn, $contactAddress);
    $fname          = mysqli_real_escape_string($conn, $fname);
    $lname          = mysqli_real_escape_string($conn, $lname);
    $mname          = mysqli_real_escape_string($conn, $mname);

    $sql   = "INSERT INTO  user_master(roleId,emailId,contactNumber,upassword) VALUES($roleId,'$emailId','$contactNumber','$upassword')";
    $query = mysqli_query($conn, $sql);

    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $userId       = $conn->insert_id;
        $sql          = "INSERT INTO user_details(userId,fname,mname,lname,contactAddress,pincode) VALUES($userId,'$fname','$mname','$lname','$contactAddress','$pincode')";
        $query        = mysqli_query($conn, $sql);
        $rowsAffected = mysqli_affected_rows($conn);
        if($roleId == 2){
            $tehsil     = isset($_POST['tehsil']) ? $_POST['tehsil'] : 'NULL';
            $hectre   = isset($_POST['hectre']) ? $_POST['hectre'] : 'NULL';
            $water    = isset($_POST['water']) ? $_POST['water'] : 'NULL';
            $peek    = isset($_POST['peek']) ? $_POST['peek'] : 'NULL';
            $sql   = "INSERT INTO  farmer_details(userId,tehsil,hectre,water,peek) VALUES($userId,'$tehsil','$hectre','$water','$peek')";
            $query = mysqli_query($conn, $sql);
        }
        if ($rowsAffected == 1) {
            $academicQuery = mysqli_query($conn, "SELECT * FROM user_master um INNER JOIN user_details ud ON um.userId = ud.userId INNER JOIN rolemaster rm ON rm.roleId = um.roleId WHERE um.userId=$userId");
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
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500
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
