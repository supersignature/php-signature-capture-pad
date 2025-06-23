<!DOCTYPE html>
<html>
<head>
  <title>
	SuperSignature PHP - Mobile
  </title>
    <META http-equiv="Content-Type" content="text/html; charset=ASCII">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script> 

  <style type="text/css">
    body
    {
      height:100%;
      width:inherit;
      font-family:verdana;
      font-size:12px;
    }


    #divResize {
        height: 80vh;
        width: 90vw;
        background-color: transparent;
    }

     
  </style>
  <meta name="viewport" content="width=device-width, user-scalable=yes" />
  <script type="text/javascript" src="common/ss.js"></script>
  <script type="text/javascript" src="common/base64.js"></script>
 </head>

<body>

  <form method="post" action="super-signature.php">
 <div id="divResize">
    	<div id='ctlSignature_Container' style='width:100px;height:100px'>
	   <canvas ID='ctlSignature' width='100' height='100'></canvas>
	</div>
  </div>
  <input type="submit" style="position:absolute;bottom:10px;left:10px;" value="Save" />
      
 <script type="text/javascript">
 
        var resizing = false;
        var isMobile = false;

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            isMobile = true;
        }
        
	var signObjects = new Array('ctlSignature');
	
	var objctlSignature = new SuperSignature({SignObject:"ctlSignature",SignWidth: "100",TransparentSign:"false",SignHeight: "100",IeModalFix: true,PenColor: "#0000FF",BorderStyle: "Dashed",BorderWidth: "2px", BorderColor: "#DDDDDD",RequiredPoints: "15",ClearImage:"common/refresh.png", PenCursor:"common/pen.cur", SuccessMessage: "Cool Signature!", forceMouseEvent: true, Enabled: "true", Visible: "true"});
	
	$(document).ready(function() 
	{
	  objctlSignature.Init();
	});
	
	function Resize() {
            if (resizing) {
                return;
            }
            resizing = true;


            var divResize = $("#divResize");
            var signW = parseInt(divResize.width());
            var signH = parseInt(divResize.height());

            ResizeSignature("ctlSignature", signW, signH); // make sure the control name matches your id

            setTimeout(function () { ClearSignature("ctlSignature"); }, 100);

            divResize.show();
            resizing = false;
        }
        
        function AttachEvents() {

            if (isMobile) {

                $(window).on("load orientationchange",
                    function (e) {
                        setTimeout(function () { Resize(); }, 500);
                    });


            } else {

                $(window).on("load resize",
                    function () {
                        setTimeout(function () { Resize(); }, 500);
                    });
            }

        }

        AttachEvents();
	
   </script>

</form>	  


</body>
</html>