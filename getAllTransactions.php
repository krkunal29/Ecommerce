<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
     include "../connection.php";
	 mysqli_set_charset($conn,'utf8');
	 $response=null;
	$records= null;
    extract($_POST);
     
$sql = "SELECT * FROM transaction_master";
$query = mysqli_query($conn,$sql);
if($query != null){
    $academicAffected=mysqli_num_rows($academicQuery);
    if($academicAffected > 0)
    {
        while($academicResults = mysqli_fetch_assoc($academicQuery))
            {
                $tempOrderDetails  = $academicResults;
                $tempTransactionId = $academicResults['transactionId'];
            }
        }
}