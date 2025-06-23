<?php

$fileName = $_POST["ctlSignature_file"]; // the name of file for reference that comes from client side
$personName = $_POST["txtName"];

echo "Thanks for signing <b>" . $personName . "</b><br/>Below is your sign<br/>";
echo "<img src='../signs/" . $fileName . "'/>";   // you can adjust paths, or give live url http://www also

?>