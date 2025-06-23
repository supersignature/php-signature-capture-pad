<!DOCTYPE html>
<html>
 <head>
  <META http-equiv="Content-Type" content="text/html; charset=ASCII">
  <title>SuperSignature PHP Multiple</title>
  <script language="javascript" type="text/javascript">
        document.oncontextmenu = new Function("return false;");
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script> 
  <script type="text/javascript" src="common/ss.js"></script>
      <style>
        .Button
        {
            font-family: Segoe UI,Tahoma;
            font-size: 12px;
            font-weight: bolder;
            color: #000000;
            background-repeat: no-repeat;
            width: 150px;
            height: 20px;
            border: none;
            border: solid 1px #DCDCDC;
            margin: 5px;
        }
        li input
        {
            margin: 5px;
        }
        body
        {
            font-family: Segoe UI,Tahoma;
            font-size: 12px;
        }
    </style>
 </head>
 <body>
  <noscript>
        <meta http-equiv="refresh" content="1; URL='/'" />
    </noscript>
  <form method="post" action="super-signature-multiple.php">
  
    <table>
      <tr>
        <td>
        <div id='ctlSignature_Container' style='width:240px;height:180px'>
            <canvas ID='ctlSignature' width='240' height='180'></canvas>
        </div>
       </td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
        <td>
        <div id='ctlSignature2_Container' style='width:240px;height:180px;position:relative'>
            <canvas ID='ctlSignature2' width='240' height='180'></canvas>           
        </div>
        </td>
      </tr>
    </table>
  
    <br/>
    <input type="submit" value="Save Signatures!" onclick="javascript:return ValidateSignature();" class="Button" />
  </form>  
   <script type="text/javascript">
	var signObjects = new Array('ctlSignature','ctlSignature2');
	
	var objctlSignature = new SuperSignature({SignObject:"ctlSignature",SignWidth: "240",SignHeight: "180" ,BorderStyle:	"Dashed",BorderWidth: "2px",BorderColor: "#DDDDDD",RequiredPoints: "15",ClearImage:"common/refresh.png", PenCursor:"common/pencil.cur", Visible: "true"});	
	var objctlSignature2 = new SuperSignature({SignObject:"ctlSignature2",SignWidth: "240",SignHeight: "180" ,BorderStyle:	"Dashed",BorderWidth: "2px",BorderColor: "#DDDDDD",PenColor: "#0000FF", RequiredPoints: "15",ClearImage:"common/refresh.png", PenCursor:"common/pen.cur", Visible: "true", forceMouseEvent: true, Enabled: "true"});	
	
	// Initialize signatures
	
	$(document).ready(function() 
	{
	  objctlSignature.Init();
	  objctlSignature2.Init();
	});
	
   </script>
 </body>
</html>