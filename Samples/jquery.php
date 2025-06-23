<!DOCTYPE html>
<html>
<head>
    <title>
        SuperSignature - jQuery
    </title>
    <META http-equiv="Content-Type" content="text/html; charset=ASCII">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" type="text/css" />

    <script language="javascript" type="text/javascript">
        document.oncontextmenu = new Function("return false;");
    </script>

    <style type="text/css">
        .save {
            border: solid 1px #DCDCDC;
            padding: 2px;
            margin-left: 10px;
            background-color: #79B933;
            font-size: 14px;
            color: #FFFFFF;
            font-weight: bold;
            position: absolute;
        }


        .ui-dialog .ui-dialog-content {
            padding: 1px;
        }
    </style>


    <script type="text/javascript" src="common/ss.js"></script>

</head>

<body>

    <a id="aSign" href="javascript:void(0);" onclick="ShowSignModal();"><h1>Click Here To Sign</h1></a>
    <br />
    <div id="wrapper">
        <form method="post" action="super-signature.php">
            <div id='ctlSignature_Container' style='width:450px;height:300px'>
                <canvas ID='ctlSignature' width='450' height='300'></canvas>
            </div>
            <br />
            <input type="submit" name="btnSave" value="Save" id="btnSave" class="save" />


            <script type="text/javascript">
                var signObjects = new Array('ctlSignature');

                var objctlSignature = new SuperSignature({ SignObject: "ctlSignature", SignWidth: "450", SignHeight: "300", IeModalFix: false, PenColor: "#DCBCDA", BorderStyle: "Dashed", BorderWidth: "2px", BorderColor: "#DDDDDD", RequiredPoints: "15", ClearImage: "common/refresh.png", PenCursor: "common/pen.cur", Visible: "true", forceMouseEvent: true, Enabled: "true" });


                $(document).ready(function () {

                    objctlSignature.Init();
                });
            </script>

        </form>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

    <script type="text/javascript">



        function ShowSignModal() {
            $("#wrapper").dialog("open");

        }

        $(document).ready(function () {

            $("#wrapper").dialog({
                height: 450,
                width: 490,
                modal: false,
                autoOpen: false,
                minHeight: 410,
                minWidth: 500
            });

        });


    </script>

</body>
</html>