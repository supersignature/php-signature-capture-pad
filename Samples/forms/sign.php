<!DOCTYPE html>
<html>
 <head>
  <title>SuperSignature PHP - Forms Demo</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <script language="javascript" type="text/javascript">
        document.oncontextmenu = new Function("return false;");
  </script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
      <style>
        .Button
        {
            font-family: Segoe UI,Tahoma;
            font-size: 12px;
            font-weight: bolder;
            color: #000000;
            background-repeat: no-repeat;
            border: solid 1px #DCDCDC;
            margin-left: 13px;
            padding:5px;
        }
        li input
        {
            margin: 5px;
        }
        body
        {
            font-family: Segoe UI,Tahoma;
            font-size: 16px;
        }
        input
        {
            border: solid 1px #DCDCDC;
        }
    </style>
 </head>
 <body>
  <noscript>
        <meta http-equiv="refresh" content="1; URL='/'" />
    </noscript>
  <form method="post" action="submit-form.php">
    <input type="hidden" value="<?php echo uniqid() . '.png' ?>" id="ctlSignature_file" name="ctlSignature_file" />
    <h1>SuperSignature Form Demo</h1>
    <p>The iframe below gets the unique file name from this page, it comes from hidden input ctlSignature_file</p>
    <p>The file will get saved on server (<u>under signs folder, which should be 777</u>) with same name as given from this page, hence the submit script submit-form.php will also get same name to show the image.</p>
    <br/>
    <iframe id="frmSign" name="frmSign" src="control.php"  width="480px" height="420px" style="width:480px;height:420px;" scrolling="no" frameborder="0"></iframe>
    <hr/>
    <p>
      Name of person signing&nbsp;:&nbsp;<input type="text" id="txtName" name="txtName" style="background-color:yellow" />&nbsp;and <b>then</b> hit Submit!
    </p>
    <p>
      <input type="submit" id="btnSend" name="btnSend" class="Button" value="Submit" onclick="javascript:return document.getElementById('txtName').value.length > 0;" />&nbsp;<input type="button" id="btnShow" name="btnShow" class="Button" value="Show Me" onclick="javascript:return document.getElementById('imgShow').src = '../signs/' + document.getElementById('ctlSignature_file').value + '?rnd=' + Math.random();" />&nbsp;<input type="button" value="Sign Again!" class="Button" onclick="javascript:document.getElementById('frmSign').src = 'control.php?fileName=' +  document.getElementById('ctlSignature_file').value;" />
    </p>
    <p>
      You can also click the "Show Me" button to see the generated image below, but make sure you hit "Save signature" first!<br/><br/>
      <img src="refresh.png" id="imgShow" name="imgShow" />
    </p>
    <script language="javascript" type="text/javascript">
      $(document).ready(function() { document.getElementById('frmSign').src = 'control.php?fileName=' + document.getElementById('ctlSignature_file').value });
    </script>
 </body>
</html>