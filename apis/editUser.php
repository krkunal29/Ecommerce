<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
// && isset($_POST['upassword'])
if (isset($_POST['userId']) && isset($_POST['roleId']) && isset($_POST['contactNumber']) && isset($_POST['emailId'])
 && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['contactAddress'])) {

    $mname     = isset($_POST['mname']) ? $_POST['mname'] : 'NULL';
    $pincode   = isset($_POST['pincode']) ? $_POST['pincode'] : 'NULL';
    $upassword =12345;

    $Contactaddress = mysqli_real_escape_string($conn, $contactAddress);
    $fname          = mysqli_real_escape_string($conn, $fname);
    $lname          = mysqli_real_escape_string($conn, $lname);
    $mname          = mysqli_real_escape_string($conn, $mname);

    $sql   = "UPDATE  user_master um SET um.roleId=$roleId,um.emailId='$emailId',
    um.contactNumber='$contactNumber'  WHERE um.userId = $userId";
    $query = mysqli_query($conn, $sql);
    // $rowsAffected = mysqli_affected_rows($query);
    // echo "rowaffected".$rowsAffected."\n";
    $sql1   = "UPDATE user_details ud SET
    ud.fname = '$fname',ud.mname='$mname',ud.lname = '$lname',ud.pincode = '$pincode',ud.contactAddress='$Contactaddress'  WHERE  ud.userId = $userId";
    $query1 = mysqli_query($conn, $sql1);

    // $rowsAffected1 = mysqli_affected_rows($query1);
    // echo "rowaffected1".$rowsAffected1;
    // if ($rowsAffected == 1 || $rowsAffected1==1) {
         if($roleId == 2){
            $tehsil     = isset($_POST['tehsil']) ? $_POST['tehsil'] : 'NULL';
            $hectre   = isset($_POST['hectre']) ? $_POST['hectre'] : 'NULL';
            $water    = isset($_POST['water']) ? $_POST['water'] : 'NULL';
            $peek    = isset($_POST['peek']) ? $_POST['peek'] : 'NULL';
            $sql   = "UPDATE farmer_details SET tehsil='$tehsil',hectre='$hectre',water='$water',peek='$peek' WHERE userId = $userId";
            $query = mysqli_query($conn, $sql);
            // echo $sql;
        }
        // if ($rowsAffected == 1 || $rowsAffected1 == 1) {
          $sql   = "SELECT * FROM user_master um Left JOIN user_details ud ON um.userId = ud.userId Left JOIN rolemaster rm ON rm.roleId = um.roleId
          Left JOIN farmer_details fd ON fd.userId = ud.userId
          WHERE um.userId=$userId";
          $jobQuery1 = mysqli_query($conn, $sql);
          if ($jobQuery1 != null) {
              $academicAffected = mysqli_num_rows($jobQuery1);
              if ($academicAffected > 0) {
                  $academicResults = mysqli_fetch_assoc($jobQuery1);
                  $records       = $academicResults;
            $response = array(
                'Message' => "User Updated Successfully",
                "Data" => $records,
                'Responsecode' => 200
            );
          }

        }
    // } else {
    //     $response = array(
    //         'Message' => "Parameters failed",
    //         'Responsecode' => 500
    //     );
    // }
// } else {
//     $response = array(
//         "Message" => "Parameters missing",
//         "Responsecode" => 403
//     );
//   }
}
mysqli_close($conn);
print json_encode($response);
?>
