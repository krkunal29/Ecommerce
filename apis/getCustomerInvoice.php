<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once("../connection.php");
mysqli_set_charset($conn,'utf8');
$response=null;
$records=null;
$query = null;
$comments = null;
$temp = null;
extract($_POST);
if(isset($_POST['customerId'])){
    $query = "SELECT * FROM transaction_master tm
LEFT JOIN customer_master cm
on cm.customerId = tm.customer_Id
WHERE tm.customer_Id = $customerId";
$jobQuery = mysqli_query($conn,$query);
if($jobQuery!=null)
    {
	$academicAffected=mysqli_num_rows($jobQuery);
	 if($academicAffected>0)
		{
	    while($academicResults = mysqli_fetch_assoc($jobQuery)){
            $temp = null;
            $tId = $academicResults['transactionId'];
            $sql = "SELECT * FROM transaction_details td
            LEFT join product_master pm  on pm.productId = td.productId
            LEFT join taxmaster tm on tm.TaxId =td.taxId
            WHERE td.transaction_id = $tId";
            $jobQuery_1 = mysqli_query($conn,$sql);
            $academicAffected_1=mysqli_num_rows($jobQuery_1);
            if($academicAffected_1>0)
		{
            while($academicResults_1 = mysqli_fetch_assoc($jobQuery_1)){
                $temp[] = $academicResults_1;
            }
            $result = array('products'=>$temp);

            $records[] = array_merge($academicResults,$result);
        }

        }


        $response = array('Message'=>"All Post Data fetched Successfully","Data"=>$records ,'Responsecode'=>200);
		}else{
            $response = array('Message'=>"No User Posts available","Data"=>$records ,'Responsecode'=>205);
        }
	}else{
        $response = array('Message'=>mysqli_error($conn),"Data"=>$records ,'Responsecode'=>403);
    }
}else{
    $response = array('Message'=>"Parameter Missing","Data"=>$records ,'Responsecode'=>205);
}
mysqli_close($conn);
exit(json_encode($response));
?>
