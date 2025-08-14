

<?php
include('autoload.php');
//echo $_POST['html'];
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

if(empty($_POST['page']))
{$page='A4';}else{$page=$_POST['page'];}

if(empty($_POST['orientation']))
{$orientation='portrait';}else{$orientation=$_POST['orientation'];}


//------ html
$html  ='<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .='<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">';
$html .='<style>
table {
				width: 100%;
				border-collapse: collapse;
                font-size:12px;
                vertical-align: top;
				
				
			}
			table th{
				border: 1px solid #000;
				font-size:12px; font-weight:300; text-align:center; padding:2px;}
			table td{
				border: 1px solid #000;
				font-size:10px; text-align:left; padding:2px; vertical-align: top;}	

			
            h3{font-size:17px; margin:1px; display:block;}    
            h4{font-size:14px; margin:1px; display:block;}    
            h5{font-size:13px; margin:1px; display:block;}    
            h6{font-size:12px; margin:1px; display:block;}    
            </style>';
$html .='</head><body>';
$html .= $_POST['html'];
$html .='</body></html>';

$options = new Options();
$options->set('defaultFont', 'Hind-Regular');
$dompdf = new Dompdf($options);


// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);


// (Optional) Setup the paper size and orientation
$dompdf->setPaper($page, $orientation);

//echo $html;

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($_POST['filename']);


//---------- short code


// $dompdf = new DOMPDF();
// $dompdf->set_paper('A4', 'portrait');
// $dompdf->load_html($_POST['html']);
// $dompdf->render();
// $dompdf->stream();
?>