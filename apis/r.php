<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';


/* reference the Dompdf namespace */
use Dompdf\Dompdf;


/* instantiate and use the dompdf class */
$dompdf = new Dompdf();


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

                    <div class="row pb-5 p-5">
                        <div class="col-xs-6">
                            <p class="font-weight-bold mb-4">Client Information</p>
                            <p class="mb-1">John Doe, Mrs Emma Downson</p>
                            <p>Acme Inc</p>
                            <p class="mb-1">Berlin, Germany</p>
                            <p class="mb-1">6781 45P</p>
                        </div>

                        <div class="col-xs-6">
                            <p class="font-weight-bold mb-4">Invoice Details</p>
                            <p class="mb-1"><span class="text-muted">Invoice Number: </span> 1425782</p>
                            <p class="mb-1"><span class="text-muted">Date: </span> 27 October 2020</p>
                            <p class="mb-1"><span class="text-muted">DC No: </span> 250</p>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="row p-5">
                        <div class="col-xs-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">HSN</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Rate</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Amount</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">GST</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">CGST</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">SGST</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Thumsup</td>
                                        <td>125</td>
                                        <td>2</td>
                                        <td>12.00</td>
                                        <td>$321</td>
                                        <td>$3452</td>
                                        <td>12.00</td>
                                        <td>$321</td>
                                        <td>$3452</td>
                                    </tr>
                                   
                                   
    							
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6"></td>
                                    <td colspan="2">SUBTOTAL</td>
                                    <td>$5,200.00</td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                    <td colspan="2">TAX 25%</td>
                                    <td>$1,300.00</td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                    <td colspan="2">GRAND TOTAL</td>
                                    <td>$6,500.00</td>
                                </tr>
                            </tfoot>
                            </table>
                           
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