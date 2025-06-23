<!DOCTYPE html>
<html>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=ASCII">
<title>
	PDF Document
</title>
    <style type="text/css">
      body
      {
      	font-family:Verdana;
      	font-size:12px;
      	margin:30px;
      }
     
    </style>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script> 
    <script language="javascript" type="text/javascript">
        document.oncontextmenu = new Function("return false;");
    </script>

  <script type="text/javascript" src="../common/ss.js"></script>
  
</head>
<body>
    <form method="post" action="license_agreement.php">

	     First Name: <input type="text" id="fName" name="fName" value="John" /><br/><br/>
             Last Name: <input type="text" id="lName" name="lName" value="Doe" /><br/><br/><br/>
	     <div id='ctlSignature_Container' style='width:380px;height:270px;'>
               <script language="javascript" type="text/javascript">
	            var ieVer = getInternetExplorerVersion();
	            if (isIE) {
	                if (ieVer >= 9.0)
	                    isIE = false;
	            }
	
	            if (isIE) 
	            {
	                document.write("<div ID='ctlSignature' style='width:380px;height:250px;'></div>");
	            }
	            else 
	            {
	                document.write("<canvas ID='ctlSignature' width='380' height='250'></canvas>");
	            }
	         </script>
	    </div>
            <br /><br/>
           <input type="submit" name="btnSave" value="Save" onclick="javascript:return ValidateSignature();" id="btnSave" />
    
</form>

<script type="text/javascript">
	var signObjects = new Array('ctlSignature');
	
	var objctlSignature = new SuperSignature({SignObject:"ctlSignature",SignWidth: "380",SignHeight: "250",PenColor: "#0000FF",IeModalFix: false,BorderStyle: "Dashed",BorderWidth: "2px",BorderColor: "#DDDDDD",RequiredPoints: "15",ClearImage:"../common/refresh.png", PenCursor:"../common/pencil.cur", Visible: "true"});	
	
	
	$(document).ready(function() 
	{
	  objctlSignature.Init();
	});

   </script>

</html>
