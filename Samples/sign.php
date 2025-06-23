<!DOCTYPE html>
<html>
 <head>
  <META http-equiv="Content-Type" content="text/html; charset=ASCII">
  <title>SuperSignature PHP Trial</title>
  <script language="javascript" type="text/javascript">
        document.oncontextmenu = new Function("return false;");
  </script>
      <style>
        .Button
        {
            font-family: Segoe UI,Tahoma;
            font-size: 12px;
            font-weight: bolder;
            color: #000000;
            background-repeat: no-repeat;
            width: 80px;
            height: 20px;
            border: none;
            border: solid 1px #DCDCDC;
            margin-left: 13px;
            margin-top:-5px;
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
        <meta http-equiv="refresh" content="1; URL='https://www.supersignature.com'" />
    </noscript>
  <form method="post" action="super-signature.php">
    <h1>SuperSignature PHP Trial</h1>
    <iframe id="frmSign" name="frmSign" src="control.php" width="480px" height="420px" style="width:480px;height:420px;" scrolling="no" frameborder="0"></iframe>
    <br /><input type="button" value="Sign Again!" class="Button" onclick="javascript:document.getElementById('frmSign').src = 'control.php';" />
    <br />
   </form>
 </body>
</html>