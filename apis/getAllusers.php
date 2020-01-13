<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['roleId'])){
$sql      = "SELECT ud.refferalCode,um.isActive, um.userId,um.roleId,um.emailId,um.contactNumber,um.upassword,ud.fname,ud.mname,ud.lname,ud.city,ud.state,ud.country,ud.contactAddress,ud.pincode,ud.profileUrl
FROM user_master um 
INNER JOIN user_details ud ON um.userId = ud.userId
WHERE um.roleId = $roleId";

}else{
$sql      = "SELECT ud.refferalCode, um.isActive,um.userId,um.roleId,um.emailId,um.contactNumber,um.upassword,ud.fname,ud.mname,ud.lname,ud.city,ud.state,ud.country,ud.contactAddress,ud.pincode,ud.profileUrl,rm.role,rm.roleId,fm.tehsil,fm.hectre,fm.water,fm.peek
 FROM user_master um 
INNER JOIN user_details ud ON um.userId = ud.userId 
INNER JOIN rolemaster rm ON rm.roleId = um.roleId 
left JOIN farmer_details fm ON fm.userId =um.userId";
}

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
