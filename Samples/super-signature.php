<?php

$signData = $_POST["ctlSignature_data"]; // the data that comes from client side
$signDataSmooth = $_POST["ctlSignature_data_canvas"]; // the smooth data that comes from client side
$fileName = $_POST["ctlSignature_file"]; // the name of file for reference that comes from client side
$im = null;

include 'common/license.php';

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
  echo "<h3>Missing or invalid signature data.</h3>";
}
	
  	
  if(null != $im)
  {
             // IF YOU NEED TRANSPARENT IMAGE
	     $transparent_image = setTransparency($im);

 	    if(strlen($fileName) > 0)
	    {
       	       // Process the $im object here on your server you can save, email, store in DB etc.

   	        imagepng($transparent_image,'signs/' . $fileName,0,NULL);
           
   	        // Please see http://php.net/manual/en/function.imagepng.php
	        // You can also use JPEG  http://www.php.net/manual/en/function.imagejpeg.php
	   
	        // For DB, http://stackoverflow.com/questions/17377645/how-to-save-uploaded-image-in-database-with-php
	    }

      Header("Content-type: image/png");
      	
      // WRITE IT BACK TO BROWSER
      imagepng($transparent_image);
	
       ImageDestroy($im); 
       ImageDestroy($transparent_image); 
         
  }
  else
  {
      echo "<h3>Error generating signature. Check license.</h3>";
  }


    function setTransparency($picture)
    {
       
	$img_w = imagesx($picture);
	$img_h = imagesy($picture);

	$newPicture = imagecreatetruecolor( $img_w, $img_h );
	imagesavealpha( $newPicture, true );
	$rgb = imagecolorallocatealpha( $newPicture, 0, 0, 0, 127 );
	imagefill( $newPicture, 0, 0, $rgb );

	$color = imagecolorat( $picture, $img_w-1, 1);

	for( $x = 0; $x < $img_w; $x++ ) {
    	   for( $y = 0; $y < $img_h; $y++ ) {
        	$c = imagecolorat( $picture, $x, $y );
        	if($color!=$c){         
            		imagesetpixel( $newPicture, $x, $y,    $c);             
        	}           
   	   }
	}

	imagedestroy($picture);
	return $newPicture;       
    } 

?>