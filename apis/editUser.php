<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
// && isset($_POST['upassword'])
if (isset($_POST['userId']) && isset($_POST['roleId']) && isset($_POST['contactNumber']) && isset($_POST['emailId']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['country']) && isset($_POST['contactAddress'])) {

    $mname     = isset($_POST['mname']) ? $_POST['mname'] : 'NULL';
    $pincode   = isset($_POST['pincode']) ? $_POST['pincode'] : 'NULL';
    $upassword =12345;

    $Contactaddress = mysqli_real_escape_string($conn, $contactAddress);
    $fname          = mysqli_real_escape_string($conn, $fname);
    $lname          = mysqli_real_escape_string($conn, $lname);
    $mname          = mysqli_real_escape_string($conn, $mname);
    $state         = mysqli_real_escape_string($conn, $state);
    $city          = mysqli_real_escape_string($conn, $city);
    $country          = mysqli_real_escape_string($conn, $country);
    if(isset($_FILES["imgname"]["type"])){
        $imgname = $_FILES["imgname"]["name"];
        $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = "user/".$userId.".jpg"; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
      }
    $sql   = "UPDATE  user_master um SET um.roleId=$roleId,um.emailId='$emailId',
    um.contactNumber='$contactNumber'  WHERE um.userId = $userId";
    $query = mysqli_query($conn, $sql);
    // $rowsAffected = mysqli_affected_rows($query);
    // echo "rowaffected".$rowsAffected."\n";
    $sql1   = "UPDATE user_details ud SET
    ud.fname = '$fname',ud.mname='$mname',ud.lname = '$lname',ud.pincode = '$pincode',
    ud.city = '$city',ud.state='$state',ud.country = '$country',
    ud.contactAddress='$Contactaddress'  WHERE  ud.userId = $userId";
    $query1 = mysqli_query($conn, $sql1);

    // $rowsAffected1 = mysqli_affected_rows($query1);
    // echo "rowaffected1".$rowsAffected1;
    // if ($rowsAffected == 1 || $rowsAffected1==1) {
         if($roleId == 2){
            $tehsil     = isset($_POST['tehsil']) ? $_POST['tehsil'] : 'NULL';
            $hectre   = isset($_POST['hectre']) ? $_POST['hectre'] : 'NULL';
            $water    = isset($_POST['water']) ? $_POST['water'] : 'NULL';
            $peek    = isset($_POST['peek']) ? $_POST['peek'] : 'NULL';
            $sql   = "DELETE FROM farmer_details WHERE userId= $userId";
            $query = mysqli_query($conn, $sql);
            $sql   = "INSERT INTO farmer_details(userId,tehsil, hectre, water, peek) VALUES ('$userId','$tehsil','$hectre','$water','$peek')";
            $query = mysqli_query($conn, $sql);
            //
        }
        // if ($rowsAffected == 1 || $rowsAffected1 == 1) {
          $sql   = "SELECT um.userId,um.roleId,um.emailId,um.contactNumber,ud.fname,
          ud.mname,ud.lname,ud.contactAddress,ud.pincode,  ud.city,ud.state,ud.country,
          rm.role,rm.roleId,fd.tehsil,fd.hectre,fd.water,fd.peek
          FROM user_master um Left JOIN user_details ud ON um.userId = ud.userId Left JOIN rolemaster rm ON rm.roleId = um.roleId
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
}else{
  $response = array(
    'Message' => "Parameter Missing",
    'Responsecode' => 401
);
}
mysqli_close($conn);
print json_encode($response);
?>
