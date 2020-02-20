<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response=null;
$records = null;
extract($_POST);
if (isset($_POST['contactNumber'])) {
    $query = "SELECT cm.customerId,cm.custName,cm.contactNumber FROM  customer_master cm WHERE cm.contactNumber ='$contactNumber'";
    $jobQuery = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if ($jobQuery != null) {
        $academicAffected = mysqli_num_rows($jobQuery);
        if ($academicAffected >0) {
            $academicResults = mysqli_fetch_assoc($jobQuery);
                $records = $academicResults;
                $otp = rand(100000,999999);
                $msg = "नमस्कार! ".$otp." हा आपला संकेतशब्द आहे.याची वैधता तीन मिनिट एवढी आहे.";
                $msg = urlencode($msg);
                $url = "http://sms24x7.prygma.com/vendorsms/pushsms.aspx?user=kisanagro&password=123456&msisdn=$contactNumber&sid=KISAAN&msg=$msg&fl=0%20&gwid=2&dc=8";
                $json = file_get_contents($url);
$json_data = json_decode($json, true);
                $response = array('Message' => "Login Successfully", "Data" => $records,'otpResponse'=>$json_data,'otp'=>$otp, 'Responsecode' => 200);
            }else{
                $response = array('Message' => "No user present/ Invalid contact number", "Data" => $records, 'Responsecode' => 402);
            }
        } else {
            $response = array('Message' => "No user present/ Invalid contact number or password", "Data" => $records, 'Responsecode' => 401);
        }
}else{
    $response = array('Message' => "Parameter Missing", "Data" => $records, 'Responsecode' => 500);
}
mysqli_close($conn);
print json_encode($response);
?>
