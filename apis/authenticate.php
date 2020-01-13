<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['usrname']) && isset($_POST['passwrd'])) {
    $sql      = "SELECT um.userId,um.roleId,ud.fname FROM  user_master um INNER JOIN user_details ud ON um.userId=ud.userId WHERE um.emailId='$usrname' AND um.upassword='$passwrd'";
    $jobQuery = mysqli_query($conn, $sql);
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected > 0) {
            $academicResults = mysqli_fetch_assoc($jobQuery);
            $records         = $academicResults;
            $response        = array(
                'Message' => "Welcome",
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
} else {
    $response = array(
        'Message' => "Parameter Missing",
        "Data" => $records,
        'Responsecode' => 500
    );
}
mysqli_close($conn);
exit(json_encode($response));
?>