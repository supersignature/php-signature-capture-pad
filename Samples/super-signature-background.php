<?php

$signData = $_POST["ctlSignature_data"]; // the data that comes from client side
$signDataSmooth = $_POST["ctlSignature_data_canvas"]; // the smooth data that comes from client side
$fileName = $_POST["ctlSignature_file"]; // the name of file for reference that comes from client side

include 'common/license.php';

$im  = null;

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
                   Header("Content-type: image/png");

                   $file = 'signs/' . uniqid() . '.png';
                   imagepng($im,$file,5,NULL); //save signature image
      
                   //start save signature with background
                   $signature = imagecreatefrompng($file);
                   $bg_image = imagecreatefromgif('resources/sign-here.gif');
     
                   imagealphablending($signature, true);
                   imagesavealpha($signature, true);

                   $x = 300; $y = 157; // where x and y are the dimensions of the final image
                   imagecopy($signature, $bg_image, 0, 0, 0, 0, $x, $y);
                   imagepng($signature, $file);//overwrite original  file with signature & background
      
                   imagetruecolortopalette($signature,false, 255);
                   $index = imagecolorclosest ($signature,0,0,0); 
                   imagecolorset($signature,$index,255,255,255); 

                   imagepng($signature);

                   ImageDestroy($im);
                   ImageDestroy($bg_image);
                   ImageDestroy($signature);

              }
              else
              {
                echo "<h3>Error generating signature. Check license.</h3>";
              }



?>
