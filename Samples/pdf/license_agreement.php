<?php
require_once('fpdf.php');
require_once('fpdi.php');

$signData = $_POST["ctlSignature_data"]; // the data that comes from client side
$signDataSmooth = $_POST["ctlSignature_data_canvas"]; // the smooth data that comes from client side
// $fileName = $_POST["ctlSignature_file"]; // the name of file for reference that comes from client side
$fName = $_POST["fName"]; // first name
$lName = $_POST["lName"]; // last name

include '../common/license.php';

$im = null;

if (strlen($signDataSmooth) > 0) 
{
	$im = GetSignatureImageSmooth($signDataSmooth);
}
else if (strlen($signData) > 0) 
{
  $im = GetSignatureImage($signData);
}
else
{
  echo "<h3>Invalid or missing signature data.</h3>";
}
  	
  	if(null != $im)
  	{
		// initiate FPDI
		$pdf = new FPDI();
		// add a page
		$pdf->AddPage();
		// set the sourcefile
		$pdf->setSourceFile('LICENSE_AGREEMENT.pdf');
		// import page 1
		$tplIdx = $pdf->importPage(1);
		// use the imported page and place it at point 10,10 with a width of 100 mm
		$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);
		
		// now write some text above the imported page
		$pdf->SetFont('Arial');
		$pdf->SetTextColor(0,0,255);
		$pdf->SetXY(45, 75);
		$pdf->Write(0, $fName);
		
		$pdf->SetXY(45, 84);
		$pdf->Write(0, $lName);
		
		$offset=5*60*60; //converting 5 hours to seconds.
		$dateFormat="m-d-Y H-i";
		$timeNdate=gmdate($dateFormat, time()+$offset);
		
		$fileName = $fName . '_' . $lName . '_' . $timeNdate . '.png';
		
		$pdf->SetXY(35, 94);
		$pdf->Write(0, $timeNdate . ' (m/d/y GMT)');
		
		imagepng($im,'../signs/' . $fileName,0,NULL);
		
		// to resize and then add to pdf, see http://net.tutsplus.com/tutorials/php/image-resizing-made-easy-with-php/
		
		$pdf->Image('../signs/' . $fileName,45,100,0,0,'PNG');

		unlink('../signs/' . $fileName); // delete the signature temp file)
		
		$pdf->Output($timeNdate . '.pdf', 'D');  // pass 'F' to physically save (http://www.fpdf.org/en/doc/output.htm)

        }
        else
        {
          echo "<h3>Error generating signature. Check license.</h3>";
        }


?>