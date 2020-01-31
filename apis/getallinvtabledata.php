<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
$query = "SELECT tm.transactionId,cm.custName,cm.contactNumber,DATE_FORMAT(tm.invDate,'%d %b %Y') invDate, ROUND(sum(td.rate*td.quantity), 2) as rate1,
tm.totalcost as rate from transaction_master tm
LEFT JOIN customer_master cm ON cm.customerId = tm.customer_Id
LEFT JOIN transaction_details td On td.transaction_id = tm.transactionId
GROUP by tm.transactionId ORDER BY tm.transactionId DESC";
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
