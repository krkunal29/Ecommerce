<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
$query = "SELECT tm.transactionId,ud.fname,ud.lname,um.emailId,um.contactNumber,tm.invDate, ROUND(sum(td.rate), 2) as rate from transaction_master tm LEFT JOIN user_master um ON um.userId = tm.userId LEFT JOIN user_details ud ON ud.userId =tm.userId LEFT JOIN transaction_details td On td.transaction_id = tm.transactionId GROUP by tm.transactionId ";
$jobQuery = mysqli_query($conn,$query);
if($jobQuery!=null)
    {
	$academicAffected=mysqli_num_rows($jobQuery);
	 if($academicAffected>0)
		{
		while($academicResults = mysqli_fetch_assoc($jobQuery))
				{
					$records[]=$academicResults;
                }
            $response = array('Message'=>"All invoice Data fetched Successfully","Data"=>$records ,'Responsecode'=>200);
		}else{
            $response = array('Message'=>"Please Add data first","Data"=>$records ,'Responsecode'=>200);
        }
	}else{
        $response = array('Message'=>mysqli_error($conn),"Data"=>$records ,'Responsecode'=>403);
    }
mysqli_close($conn);
exit(json_encode($response));
?>
