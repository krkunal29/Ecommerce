<?php
/* include autoloader */
require_once 'dompdf/autoload.inc.php';


/* reference the Dompdf namespace */
use Dompdf\Dompdf;


/* instantiate and use the dompdf class */
$dompdf = new Dompdf();


$html = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<h1>Welcome to ItSolutionStuff.com</h1>
		<table class="table table-bordered">
			<tr>
				<th colspan="2">Information Form</th>
			</tr>
			<tr>
				<th>Name</th>
				<td>vikas</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>vikaspawar3110@gmail.com</td>
			</tr>
			<tr>
				<th>Website URL</th>
				<td>www.web.kissanagro.com</td>
			</tr>
			<tr>
				<th>Say Something</th>
				<td>i am not saying something</td>
            </tr>
            <tr>
				<th>Say Something</th>
				<td><button type="button" class="btn btn-success">vikas</button></td>
			</tr>
		</table>';


$dompdf->loadHtml($html);


/* Render the HTML as PDF */
$dompdf->render();


/* Output the generated PDF to Browser */
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
?>