<!DOCTYPE html>
<html>
<head>
<META http-equiv="Content-Type" content="text/html; charset=ASCII">
<title>
	SuperSignature PHP - Document Signing
</title>
    <style type="text/css">
      body
      {
      	font-family:Verdana;
      	font-size:12px;
      }
      
       #overlay {
         visibility: hidden;
         position: relative;
         left: 0px;
         top: 0px;
         width:100%;
         margin-top:-250px;
    }
      
      .save
     {
       border:solid 1px #DCDCDC;
       padding:2px;
       background-color: Navy;
       font-size:14px;
       color: #FFFFFF;
       font-weight:bold;
     }   
     
     .cancel
     {
       border:solid 1px #DCDCDC;
       padding:2px;
       background-color: Navy;
       font-size:14px;
       color: #FFFFFF;
       font-weight:bold;
     }   
     
     #divSign
     {
       width:220px;
       height:120px;
       border: dotted 2px blue; 
       position:relative;
       margin-top:-160px;
       margin-left:20px;
       cursor:pointer;
       display:"";
     }
     
    </style>
   
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script> 
    <script language="javascript" type="text/javascript">
        document.oncontextmenu = new Function("return false;");
    </script>

  <script type="text/javascript" src="common/ss.js"></script>
  
</head>
<body>
    <form method="post" action="super-signature.php">

        <center><img src="resources/Agreement.png" />
       
       <div onclick="ShowSignModal();" id="divSign">
         
         <br /><b>&nbsp;&nbsp;Click To Sign</b>

       </div>
       <br /><br />
       <input type="submit" name="btnAgree" value="I Agree" id="btnAgree" /></center>
       <br />
       <table id="overlay">
        <tr>
          <td style="height:320px;">
          <center>
        
	    <div id='ctlSignature_Container' style='width:380px;height:270px;margin:20px'>
               <canvas ID='ctlSignature' width='380' height='250'></canvas>
	    </div>
                </center>
              </td>
            </tr>
            <tr>
              <td><center><input type="submit" name="btnSave" value="Save" onclick="javascript:return ValidateSignature();" id="btnSave" class="save" />
        &nbsp;
                <input type="button" id="btnCancel" class="cancel" onclick="ShowSignModal();" value="Cancel" /></center></td>
            </tr>
         </table>

         <br /><br />
       <br />
    
</form>

<script type="text/javascript">
	var signObjects = new Array('ctlSignature');
	
	var objctlSignature = new SuperSignature({SignObject:"ctlSignature",SignWidth: "380",SignHeight: "250",PenColor: "#DCDCDC",IeModalFix: false,BorderStyle: "Dotted",BorderWidth: "2px",BorderColor: "#DDDDDD",RequiredPoints: "15",ClearImage:"common/refresh.png", PenCursor:"common/pencil.cur", Visible: "true"});	
	
	
	$(document).ready(function() 
	{
	  objctlSignature.Init();
	});
	
   </script>

    
 
        
    <script language="javascript">

        function ShowSignModal() {
            el = document.getElementById("overlay");
            el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
            
            el2 = document.getElementById("divSign");
            el2.style.display = (el2.style.display == "") ? "none" : "";

            if (el.style.visibility == "visible") {
                document.body.style.backgroundColor = "#DDDDDD";
                document.getElementById("btnSave").focus();
            }
            else
            {
                document.body.style.backgroundColor = "#FFFFFF";
            }
        }
    </script>
</body>
</html>
