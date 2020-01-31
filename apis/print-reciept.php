<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
include '../connection.php';
include 'currency.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

extract($_GET);
/* instantiate and use the dompdf class */
$dompdf = new Dompdf();
$TransactionId = isset($_GET['transactionId']) ? $_GET['transactionId']:'NULL';
$custState = null;
function customer_details($tId){
    include '../connection.php';
    mysqli_set_charset($conn,'utf8');
    $output = '';
    $sql = "SELECT cm.custName,cm.contactNumber,cm.billingAddress,cm.pincode,st.name stateName,ct.name cityName,
    cm.custState,DATE_FORMAT(tm.invDate,'%d,%b %Y') invDate,tm.transactionId
    FROM customer_master cm LEFT JOIN states st ON st.id = cm.custState LEFT JOIN cities ct ON ct.id = cm.custCity
    LEFT JOIN transaction_master tm ON tm.customer_Id = cm.customerId WHERE tm.transactionId = $tId";
    $academicQuery = mysqli_query($conn, $sql);
    if ($academicQuery != null) {
        $academicAffected = mysqli_num_rows($academicQuery);
        if ($academicAffected > 0) {
           $academicResults = mysqli_fetch_assoc($academicQuery);
           global $custState;
           $custState =  $academicResults['custState'];
           $output .='<div class="row pb-5 p-5">';
           $output .='<div class="col-xs-6">';
           $output .='<p class="font-weight-bold mb-4">Client Information</p>';
           $output .='<p class="mb-1">'. $academicResults['custName'].'</p>';
           $output .='<p>'. $academicResults['billingAddress'].'</p>';
           $output .='<p class="mb-1">'. $academicResults['stateName'].','. $academicResults['cityName'].'</p>';
           $output .='<p class="mb-1">'. $academicResults['pincode'].'</p> </div>';
           $output .='<div class="col-xs-6">';
           $output .='<p class="font-weight-bold mb-4">Invoice Details</p>';
           $output .='<p class="mb-1"><span class="text-muted">Invoice Number: </span> '. $academicResults['transactionId'].'</p>';
           $output .='<p class="mb-1"><span class="text-muted">Date: </span>'. $academicResults['invDate'].'</p>';
           $output .='<p class="mb-1"><span class="text-muted">DC No: </span> 250</p>';
           $output .='</div></div>';

        }
    }
    return $output;
}

function invoice_details($tId){
    include '../connection.php';
    mysqli_set_charset($conn,'utf8');
    $output = '';
    $sql = "SELECT tmm.remark,td.Quantity,td.rate,td.t_description,tmm.discount,tmm.totalcost,tm.Tax,pm.HSN,DATE_FORMAT(pm.expiryDate,'%d %b %Y') expiryDate,pm.description,pm.productName FROM transaction_details td
    INNER JOIN product_master pm ON pm.productId = td.productId
    INNER JOIN taxmaster tm ON tm.TaxId = td.taxId
    INNER JOIN transaction_master tmm ON tmm.transactionId = td.transaction_id
    WHERE td.transaction_id = $tId";
    $academicQuery = mysqli_query($conn, $sql);
    if ($academicQuery != null) {
        global $custState;
        // $output .='<pre>'.$custState.'</pre>';
        $countrycode =21;
        $academicAffected = mysqli_num_rows($academicQuery);
        if ($academicAffected > 0) {
            $output .='<table class="table table-bordered">';
            $output .='   <thead>';
            $output .='       <tr>';
            $output .='            <th class="border-0 text-uppercase small " style="width:30%">Product Name</th>';
            // $output .='        <th class="border-0 text-uppercase small font-weight-bold">Description</th>';
            $output .='            <th class="border-0 text-uppercase small font-weight-bold" style="width:10%">HSN</th>';
            $output .='            <th class="border-0 text-uppercase small font-weight-bold" style="width:5%">Qty</th>';
            $output .='            <th class="border-0 text-uppercase small font-weight-bold" style="width:5%">Rate</th>';
            $output .='           <th class="border-0 text-uppercase small font-weight-bold" style="width:10%">Tax</th>';
            $output .='            <th class="border-0 text-uppercase small font-weight-bold" style="width:10%">Amount</th>';

            if($countrycode==$custState){
                $output .='           <th class="border-0 text-uppercase small font-weight-bold" style="width:10%">CGST</th>';
                $output .='            <th class="border-0 text-uppercase small font-weight-bold" style="width:10%">SGST</th>';
            }
            else{
                $output .='            <th class="border-0 text-uppercase small font-weight-bold" style="width:20%">IGST</th>';
            }

            $output .='           <th class="border-0 text-uppercase small font-weight-bold" style="width:10%">Total</th>';
            $output .='        </tr>';
            $output .='    </thead>';
            $output .='    <tbody>';
            $totalsum =0;// without tax added
            $amounttot=0;
            $finaltotal =0; // with tax added
            $discount =0;
            $totalcost =0;
            while($academicResults = mysqli_fetch_assoc($academicQuery)){
                $calculatetax =0;
                $finalamount =0;

                $output .=' <tr>';
                $output .='       <td >'.$academicResults['productName'].'</td>';
                // $output .='        <td>'.$academicResults['description'].'</td>';
                $output .='        <td rowspan="2">'.$academicResults['HSN'].'</td>';
                $output .='        <td rowspan="2">'.$academicResults['Quantity'].'</td>';
                $output .='        <td rowspan="2">'.$academicResults['rate'].'</td>';
                $output .='        <td rowspan="2">'.$academicResults['Tax'].'</td>';
                $output .='        <td rowspan="2">'.$academicResults['Quantity']*$academicResults['rate'].'</td>';
                $discount=$academicResults['discount'];
                $totalcost =$academicResults['totalcost'];
                $amounttot = $academicResults['Quantity']*$academicResults['rate'];
                $totalsum = $totalsum + $amounttot;
                $calculatetax = $amounttot*($academicResults['Tax']/100);
                $finalamount =$calculatetax +$amounttot;
                $finaltotal = $finaltotal +$finalamount;
                if($countrycode==$custState){
                    $output .='        <td rowspan="2">'.($calculatetax/2).'</td>';
                    $output .='        <td rowspan="2">'.($calculatetax/2).'</td>';
                }
                else{
                    $output .='        <td rowspan="2">'.($calculatetax).'</td>';
                }

                $output .='        <td rowspan="2">'.$finalamount.'</td>';
                $output .='</tr>';
                $output .='<tr>';
                $output .='       <td style=""><small><font size="8px;" >('.$academicResults['expiryDate'].')</font></small></td>';
                $output .='</tr>';
                $remark = $academicResults['remark'];


            }
                $output .='</tbody>';
                if($countrycode==$custState){
                $output .='<tfoot>';
                $output .='<tr>';
                $output .='    <td colspan="6">Notes:</td>';
                $output .='    <td colspan="2">SUBTOTAL</td>';
                $output .='    <td>'.number_format($finaltotal,2).'</td>';
                $output .='</tr>';
                $output .='<tr>';
                $output .='    <td colspan="6"><font size="10px;" >'.$remark.'</font></td>';
                $output .='    <td colspan="2">Discount</td>';
                $output .='    <td>'.number_format($discount,2).'</td>';
                $output .='</tr>';
                $output .='<tr>';
                $output .='    <td colspan="6"></td>';
                $output .='    <td colspan="2">GRAND TOTAL</td>';
                $output .='    <td>'.number_format($totalcost,2).'</td>';
                $output .='</tr>';
                $output .='</tfoot>';
                }
                else{
                    $output .='<tfoot>';
                    $output .='<tr>';
                    $output .='    <td colspan="5">Notes:</td>';
                    $output .='    <td colspan="2">SUBTOTAL</td>';
                    $output .='    <td>'.number_format($finaltotal,2).'</td>';
                    $output .='</tr>';
                    $output .='<tr>';
                    $output .='    <td colspan="5"><font size="10px;" >'.$remark.'</font></td>';
                    $output .='    <td colspan="2">Discount</td>';
                    $output .='    <td>'.number_format($discount,2).'</td>';
                    $output .='</tr>';
                    $output .='<tr>';
                    $output .='    <td colspan="5">'.convertToIndianCurrency($totalcost).'</td>';
                    $output .='    <td colspan="2">GRAND TOTAL</td>';
                    $output .='    <td>'.number_format($totalcost,2).'</td>';
                    $output .='</tr>';
                    $output .='</tfoot>';
                }
                $output .='</table>';
        }
    }
    return $output;
}
$html = '<link rel="stylesheet" href="style.css">
<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-xs-4">
                        <p class="font-weight-bold mb-1">Tax Invoice</p>
                        <img class="img-fluid" src="../img/brand2.png">
                        </div>

                        <div class="col-xs-8">
                        <h2>Baliraja Krushi Seva Kendra</h2>
                            <p class="font-weight-bold mb-1">Market Yard,Vambori Tal-Rahuri Ahmadnagar 413704</p>
                            <p class="text-muted">(02426)-272075 Mo-7588024352,9763712777</p>
                            <p class="font-weight-bold mb-2">GST No:27AVAPP4553A1ZV</p>
                        </div>
                    </div>

                    <hr class="my-5">
                    '.customer_details($TransactionId).'

                    <hr class="my-5">
                    <div class="row p-5">
                        <div class="col-xs-12">
                        '.invoice_details($TransactionId).'


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>';

$dompdf->loadHtml($html);
/* Render the HTML as PDF */
$dompdf->render();


/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
?>
