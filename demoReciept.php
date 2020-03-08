<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';
include '../connection.php';
include 'currency.php';
/* reference the Dompdf namespace */
use Dompdf\Dompdf;

extract($_GET);
/* instantiate and use the dompdf class */
$refCode = '';
$dompdf = new Dompdf();
$TransactionId = isset($_GET['transactionId']) ? $_GET['transactionId']:'NULL';
$custState = null;
function headerDetails(){
    include '../connection.php';
     mysqli_set_charset($conn,'utf8');
    $result = mysqli_query($conn,"SET NAMES utf8");
    $output = '';
    $sql = "SELECT * FROM firmdetails";
    $academicQuery = mysqli_query($conn, $sql);
    if ($academicQuery != null) {
        $academicAffected = mysqli_num_rows($academicQuery);
        if ($academicAffected > 0) {
           $academicResults = mysqli_fetch_assoc($academicQuery);
          
           $output .='<div class="col-xs-8">';
           $output .='<h2>'.$academicResults['firm'].'</h2>';
           $output .='<p class="font-weight-bold mb-1">'.$academicResults['dAddress'].'</p>';
           $output .='<p class="text-muted">'.$academicResults['contactnumber'].','.$academicResults['acontactnumber'].'</p>';
           $output .='<p class="font-weight-bold mb-2">GST No:'.$academicResults['gstn'].'</p></div>';
        }
    }
    return $output;
}
function customer_details($tId){
    include '../connection.php';
     mysqli_set_charset($conn,'utf8');
    $result = mysqli_query($conn,"SET NAMES utf8");
    $output = '';
    $sql = "SELECT cm.custName,cm.contactNumber,cm.billingAddress,cm.pincode,st.name stateName,ct.name cityName,
    cm.custState,DATE_FORMAT(tm.invDate,'%d,%b %Y') invDate,tm.transactionId,cm.refferalCode
    FROM customer_master cm LEFT JOIN states st ON st.id = cm.custState LEFT JOIN cities ct ON ct.id = cm.custCity
    LEFT JOIN transaction_master tm ON tm.customer_Id = cm.customerId WHERE tm.transactionId = $tId";
    $academicQuery = mysqli_query($conn, $sql);
    if ($academicQuery != null) {
        $academicAffected = mysqli_num_rows($academicQuery);
        if ($academicAffected > 0) {
           $academicResults = mysqli_fetch_assoc($academicQuery);
           global $custState;
           $custState =  $academicResults['custState'];
           global $refCode;
           $refCode = $academicResults['refferalCode'];
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
      $result = mysqli_query($conn,"SET NAMES utf8");
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
        $countrycode =22;
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

<style>.page_break { page-break-before: always; }
.borderless td, .borderless th {
    border: none;
}</style>
<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-xs-4">
                        <img class="img-fluid" src="../img/brand2.png">
                        </div>

                      '.headerDetails().'
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
    <div class="page_break">
   
</div><div class="container">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-0">
            <div class="row">
            <table class="table table-bordered">
            <thead>
              <tr>
                <th><h3><strong>Refferal Code:'.$refCode.'</strong></h3></th>
                <th style="background-color:black;">Refferal code se aur kissan ko Agrostar se Jode Aapko har mitra ke pehle order par aap donon ko Refferal Money:Dhanywad</th>
              </tr>
            </thead>
          
          </table>
          <div class="my-5"></div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Lot No:</th>
                <th style="width:50%"></th>
              </tr>
              <tr>
              <th>Expiry:</th>
              <th style="width:50%"></th>
            </tr>
            </thead>
          </table>
          <div class="my-5"></div>
          <table class="table borderless">
          <thead>
            <tr>
              <th><p> We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.
              Tax is payble on reverse charge basis : No</p>
             <p> 1.) I ordered the product the products on the telephone call mentioned in the invoice.</p>
             <p> 2. Company couriered me the products mentioned in the invoice on my request.</p>
             <p> 3. I owe money to the products as mentioned in the invoice</p>
             <p> 4. I accept the products as mentioned in the invoice</p>
             <p> 5. I will not sell the products to sny third party.</p>
            </th>
              <th style="width:50%">
              </th>
            </tr>
          </thead>
        </table>
          <div class="row>
            <div class="col-xs-8">
            <table class="table table-bordered">
            <thead>
              <tr>
                <th>Particulars</th>
                <th>Gujrat</th>
                <th>Maharashtra</th>
                <th>Rajsthan</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td>Seed License No</td>
              <td>27/16</td>
              <td>LASD10020166</td>
              <td>1975/16</td>
            </tr>
            <tr>
              <td>Pesticides License No</td>
              <td>383</td>
              <td>LAID10020635</td>
              <td>0002/16</td>
            </tr>
            <tr>
              <td>Fertilizer License No</td>
              <td>39/16</td>
              <td>LCFDW10010010952</td>
              <td>1707/17,1204</td>
            </tr>
            </tbody>
              
           
          </table>
             </div>
            <div class="col-xs-4">

            </div>
          </div>
</div>
</div>
            </div>
            </div>
            </div>
            </div>
 ';

$dompdf->loadHtml($html);
/* Render the HTML as PDF */
$dompdf->render();


/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
?>
