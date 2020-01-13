<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
include "../refferCode.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
// && isset($_POST['upassword'])
if (isset($_POST['roleId']) && isset($_POST['contactNumber'])&& isset($_POST['state']) && isset($_POST['city']) && isset($_POST['country'])  && isset($_POST['emailId'])  && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['contactAddress'])) {

    $mname     = isset($_POST['mname']) ? $_POST['mname'] : 'NULL';
    $pincode   = isset($_POST['pincode']) ? $_POST['pincode'] : 'NULL';


    $Contactaddress = mysqli_real_escape_string($conn, $contactAddress);
    $fname          = mysqli_real_escape_string($conn, $fname);
    $lname          = mysqli_real_escape_string($conn, $lname);
    $mname          = mysqli_real_escape_string($conn, $mname);
    $state         = mysqli_real_escape_string($conn, $state);
    $city          = mysqli_real_escape_string($conn, $city);
    $country          = mysqli_real_escape_string($conn, $country);
    $sql   = "INSERT INTO  user_master(roleId,emailId,contactNumber,upassword) VALUES($roleId,'$emailId','$contactNumber','12345')";
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $refferalCode = random_strings(6);
        $userId       = $conn->insert_id;
        $last_id = mysqli_insert_id($conn);
        $s       = strval($last_id);
        if(isset($_FILES["imgname"]["type"])){
            $imgname = $_FILES["imgname"]["name"];
            $sourcePath = $_FILES['imgname']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "user/". $s.".jpg"; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
          }
        $sql          = "INSERT INTO user_details(userId,fname,mname,lname,city,state,country,contactAddress,pincode,refferalCode)
         VALUES($userId,'$fname','$mname','$lname','$city','$state','$country','$contactAddress','$pincode','$refferalCode')";
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
          $sql   = "SELECT um.userId,um.roleId,um.emailId,um.contactNumber,
          ud.fname,ud.mname,ud.lname,ud.contactAddress,ud.pincode, ud.city,ud.state,ud.country,
          rm.role,rm.roleId,fd.tehsil,fd.hectre,fd.water,fd.peek
          FROM user_master um Left JOIN user_details ud ON um.userId = ud.userId
           Left JOIN rolemaster rm ON rm.roleId = um.roleId
          Left JOIN farmer_details fd ON fd.userId = ud.userId
          WHERE um.userId=$userId";
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
