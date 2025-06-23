<?php

$signData = $_POST["ctlSignature_data"]; // the data that comes from client side
$signDataSmooth = $_POST["ctlSignature_data_canvas"]; // the smooth data that comes from client side

$signData2 = $_POST["ctlSignature2_data"]; // the data that comes from client side - 2 
$signDataSmooth2 = $_POST["ctlSignature2_data_canvas"]; // the smooth data that comes from client side - 2

$im = null;
$im2 = null;

include 'common/license.php';

if (strlen($signDataSmooth) > 0 && strlen($signDataSmooth2) > 0) 
{
    $im = GetSignatureImageSmooth($signDataSmooth);
  	$im2 = GetSignatureImageSmooth($signDataSmooth2);
}
else if (strlen($signData) > 0 && strlen($signData2) > 0) 
{
    $im = GetSignatureImage($signData);
  	$im2 = GetSignatureImage($signData2);
}
else
{
  echo "<h3>Invalid or missing signature data.</h3>";
}

  	if(null != $im && null != im2)
  	{
      // you can process the image objects here..
      
       echo "<h3>Both signature were saved!</h3>";
    }	 

?>