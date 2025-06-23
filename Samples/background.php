<!DOCTYPE html>
<html>
<title>
	SuperSignature PHP - Background
  </title>
  <META http-equiv="Content-Type" content="text/html; charset=ASCII">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script> 
    <script type="text/javascript" src="common/ss.js"></script>
    <script language="javascript" type="text/javascript">
        document.oncontextmenu = new Function("return false;");
    </script>
<body>
<form method="post" action="super-signature-background.php">
<div id='ctlSignature_Container' style='width:300px;height:157px;'>
    	
    	<script language="javascript" type="text/javascript">
            var ieVer = getInternetExplorerVersion();
            if (isIE) {
                if (ieVer >= 9.0)
                    isIE = false;
            }

            if (isIE) 
            {
                document.write("<div ID='ctlSignature' style='width:300px;height:157px;'></div>");
            }
            else 
            {
                document.write("<canvas ID='ctlSignature' width='300' height='157'></canvas>");
            }
         </script>

	   </div>
<br/>
<input type="submit" value="Save" />

 <script type="text/javascript">
 
	var signObjects = new Array('ctlSignature');
	
	var objctlSignature = new SuperSignature({SignObject:"ctlSignature",SignWidth: "300",TransparentSign:"false",SignHeight: "157",IeModalFix: false,PenColor: "#0000FF",BorderStyle: "Dashed",BorderWidth: "2px", BorderColor: "#DDDDDD",RequiredPoints: "15",ClearImage:"common/refresh.png", PenCursor:"pen.cur", SuccessMessage: "Signature Done!", SignzIndex:99, Visible: "true", BackImageUrl: "resources/sign-here.gif"});	
	
	$(document).ready(function() 
	{
	  objctlSignature.Init();
	});

   </script>

</form>
</body>
</html>