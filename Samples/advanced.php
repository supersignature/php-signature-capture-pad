<!DOCTYPE html>
<html>
<head>
   <title>
	SuperSignature PHP - Advanced
  </title>
    <META http-equiv="Content-Type" content="text/html">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="common/ss.js"></script>
<script src="resources/jquery.colorPicker.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	 

  <style type="text/css">
    body
    {
      font-family:verdana;
      font-size:12px;
    }
    input
    {
       border:solid 1px #DCDCDC;
       padding:2px;
       margin-left: 20px;
       background-color: #79B933;
       font-size:14px;
       color: #FFFFFF;
       font-weight:bold;
    }
    
	div.color_picker {
	  height: 16px;
	  width: 16px;
	  padding: 0 !important;
	  border: 1px solid #ccc;
	  background:  no-repeat top right;
	  cursor: pointer;
	  line-height: 16px;
	  float:right;
	}
	
	div#color_selector {
	  width: 110px;
	  position: absolute;
	  border: 1px solid #598FEF;
	  background-color: #EFEFEF;
	  padding: 2px;
	}
	  div#color_custom {width: 100%; float:left }
	  div#color_custom label {font-size: 95%; color: #2F2F2F; margin: 5px 2px; width: 25%}
	  div#color_custom input {margin: 5px 2px; padding: 0; font-size: 95%; border: 1px solid #000; width: 65%; }
	
	div.color_swatch {
	  height: 12px;
	  width: 12px;
	  border: 1px solid #000;
	  margin: 2px;
	  float: left;
	  cursor: pointer;
	  line-height: 12px;
	}
	
	div.controlset {display: block; padding: 0.25em 0;}    
  </style>


 </head>

<body>
  <form method="post" action="super-signature.php">
    <div style="float:left;margin:20px;">
    	<div id='ctlSignature_Container' style='width:450px;height:300px'>
	   <canvas ID='ctlSignature' width='450' height='300'></canvas>

		  <div style="margin-top:40px;position:absolute"><input type="submit" value="Save" />

		  <br/>
		  <div id="divAgent" style="font-family: verdana; font-size: 12px; width: 180px; height: 100px;border: solid 1px black; overflow: auto; margin: 20px"></div>
		  <br/>
		  <div id="ctlSignature_Debug" style="font-family: verdana; font-size: 12px;width: 180px; height: 250px; border: solid 1px black; overflow: auto; margin: 20px"></div>        
			
     </div>
      
	</div>
     </div>
       <div style="float:left;margin:20px;width:500px;">
          <div class="controlset">Change Pen Color:<input id="color1" type="text" name="color1" value="#333399" /></div>
          <br/>
          <div class="controlset">Change Back Color:<input id="color2" type="text" name="color2" value="#FFFFFF" /></div>
	  <br /><br />
         Change Pen Width:&nbsp;<select onchange="SetPenWidth();" style="float:right" id="selPenW"><option value="2">2</option><option value="4" selected="selected">4</option><option value="6">6</option><option value="8">8</option></select><br /> <br />
         <br />
         <input type="button" value="Load Sign!" onclick="LS();" class="Button" />
         <br/><br/>
         <input type="button" onclick="UndoSignature('ctlSignature');" value="Undo Sign" />
         <br/><br/>
         <input type="button" id="btnEnDis" value="Enable / Disable Signature Area" onclick="EnDis();" />
         <br/><br/>
         <input type="button" onclick="StatusBar();" value="Status Bar" />  
         <br/><br/>
         <input type="button" onclick="var t = SignatureTotalPoints('ctlSignature'); alert(t);" value="Total Points" />  
         <br/><br/>
         <input type="button" onclick="ResizeSignature('ctlSignature','300','200');" value="Resize Sign" />  
      </div>
 <script type="text/javascript">
	var signObjects = new Array('ctlSignature');
	
	var objctlSignature = new SuperSignature({SignObject:"ctlSignature",SignWidth: "450",TransparentSign:"false",SignHeight: "300", PenColor: "#0000FF",BorderStyle: "Dashed",BorderWidth: "2px", BorderColor: "#DDDDDD",RequiredPoints: "15",ClearImage:"common/refresh.png", PenCursor:"common/pen.cur", SuccessMessage: "Cool Signature!", Visible: "true", forceMouseEvent: true, Enabled: "true"});	
	
	$(document).ready(function() 
	{
	    objctlSignature.Init();
	    document.getElementById("divAgent").innerHTML = window.navigator.userAgent;
	});
	
   </script>

</form>

       
    <script type="text/javascript">

	    function LS()
        {
	     LoadSignature("ctlSignature","1,#FFFFFF,1,450,300,true,688,ctlSignature; 3,#D24747 79,68 78,68 77,67 76,66 75,66 74,65 73,64 72,64 71,64 70,64 69,64 68,64 67,64 66,64 65,64 63,64 61,64 60,64 59,65 57,65 56,66 54,67 53,68 51,68 49,69 48,71 47,72 45,73 44,75 43,77 41,80 40,83 39,85 38,89 37,93 37,96 36,100 36,102 36,103 36,105 36,106 37,106 38,106 39,106 40,106 42,106 43,106 47,106 51,106 56,106 60,106 67,106 74,106 83,107 93,108 103,109 111,110 117,112 120,113 122,116 124,120 125,124 126,129 125,135 123,140 120,145 118,148 115,150 109,152 104,154 96,155 87,155 75,155 65,155 57,155 50,154 46,154 43,154; 3,#D24747 133,119 134,119 135,120 135,121 135,122 135,123 136,123 136,124 137,125 138,126 138,127 139,128 139,129 140,129 141,130 141,131 142,132 143,132 144,132 145,132 146,132 147,132 147,131 148,131 148,130 149,130 150,129 150,128 151,127 152,126 152,125 153,124 153,123 153,122 153,121 153,119 153,118 153,117 153,116 153,115 153,114 153,113 153,112 153,113 153,115 153,117 154,119 156,121 157,121 158,123 158,124 159,125 160,125 161,125 162,124 162,123 163,123 164,121 164,120 165,118 166,116 167,114 167,112 167,111 167,110 167,109 166,108 165,107 164,106 164,107 165,111 167,115 171,121 175,128 179,138 184,147 188,156 191,162 194,168 196,170 196,174 197,175 198,176 198,178 198,179; 3,#D24747 165,106 165,105 166,104 167,104 167,103 168,103 168,102 168,101 169,101 170,100 171,100 172,99 173,99 174,99 175,99 176,99 178,99 179,99 181,99 183,99 184,99 183,100 183,101 183,102 183,103 183,105 183,108 183,109 182,111 182,113 181,114 181,115 180,115 179,115 178,115 177,115 176,115 175,115 174,115; 3,#D24747 196,96 197,96 197,95 198,95 199,94 201,93 202,92 202,91 203,90 203,89 202,89 202,88 201,87 200,87 200,86 199,86 197,87 195,88 194,90 192,91 191,93 190,95 189,96 189,98 189,99 189,100 189,101 189,102 190,103 190,104 192,105 193,105 194,105 196,105 197,105 200,105 202,105 205,105 207,104 209,103 212,102 214,101 215,100; 3,#D24747 215,100; 3,#D24747 206,83 206,82 206,81 206,80 207,79 209,78 210,77 212,77 214,76 216,76 218,76 219,76 220,76 222,76 223,77 226,79 227,81 229,83 231,85 233,87 234,88 235,90 235,91 235,92 235,93 235,94 235,95 235,96 234,97 233,97 232,98 231,98 230,98 229,98 228,97 228,96 227,96 226,95 226,93 225,90 224,89 223,87 223,86 223,84 223,83 223,80 223,78 225,75 226,73 229,70 230,68 232,66 234,65 235,63; 3,#D24747 154,181 154,180 153,179 153,178 152,177 152,176 151,176 151,175 150,175 150,174 149,174 147,174 146,174 144,174 140,174 112,205 112,206 112,207 113,208 114,209 115,209 117,210 119,211 124,212 128,212 133,212 139,212 145,212 151,212 156,212 163,212 167,212 171,213 173,213 174,214 175,215 175,216 175,217 174,220 173,224 172,229 168,233 165,237 160,241 156,245 151,247 146,248 140,249 135,249 129,249 125,249 122,248 119,247 118,247 116,246 115,246; 3,#D24747 192,210 193,211 193,212 195,214 196,217 197,219 198,220 198,222 199,223 200,224 201,225 201,226 202,226 202,225 203,225 204,224; 3,#D24747 190,200 190,201 190,202 190,203 190,204 190,205 191,206 192,206 192,207 193,208 194,208 195,208 196,207 197,206 197,205 198,204 198,203 198,201 198,200 196,200 196,199 195,199 193,198 191,197 188,197 186,197; 3,#D24747 214,200 212,200 211,201 210,202 209,203 209,204 209,205 209,206 209,208 209,209 210,210 211,210 212,211 213,211 214,211 215,211 216,211 218,210 220,210 221,209 221,208 222,207 222,206 222,205 222,204 221,202 221,201 220,200 221,202 223,207 224,212 226,214 228,222 230,229 232,236 233,243 233,248 233,253 233,255 231,258 231,259 230,259 229,259 228,258 226,256 222,254 218,250 215,247 212,243 211,242 210,241 209,240 209,239 208,238 208,237 208,236; 3,#D24747 229,198 230,198 231,197 232,197 233,197 235,197 237,198 238,199 239,201 240,202 242,203 243,206 244,208 244,209 244,208 243,207 243,206 243,204 243,203 243,201 243,199 243,196 243,195 243,193 244,192 245,191 246,190 247,190 248,190 250,190 252,191 254,193 257,195 260,197 262,199 263,200 263,201 264,202 264,203 265,203 265,204; 3,#D24747 281,180 280,180 279,181 277,181 275,182 274,183 272,184 271,185 271,186 271,187 270,188 270,190 270,191 271,193 272,193 273,194 273,195 275,196 276,196 277,196 277,195 278,194 279,193 281,191 283,188 284,186 285,183 284,181 284,183 285,186 286,189 287,190 287,191 288,191 290,192 292,192 295,191 298,190 299,189 300,189 301,188 303,186; 3,#D24747 294,149 294,151 294,153 294,155 294,158 295,160 296,165 298,168 299,170 300,173 301,174 302,176 303,177 304,177 304,178 305,178 305,179 306,179 307,179 309,179 310,179 312,178 315,177 316,176 318,175 319,175 320,174 321,174 321,173 321,172 321,171 320,171 320,170; 3,#D24747 293,169 294,168 298,166 301,164 306,161 311,159 314,156 317,153 319,152 320,151 320,150; 3,#D24747 325,153 326,156 327,158 328,160 330,162 331,163 332,164 332,165 333,165 334,165 334,164 336,163 337,161 338,160 339,158 340,156 340,154 340,152 341,150 342,148; 3,#D24747 342,147 342,145 342,144 342,146 344,148 345,150 346,152 347,154 348,155 349,156 350,157 351,157 352,157 353,156 353,155 355,153 356,151 357,151 358,149 358,147 359,146 359,144 359,142 359,140 358,138 358,137 357,136 356,135 354,134 353,132 352,132 351,132 350,132 349,132 349,133 349,134 349,136 349,137 350,138 351,139 352,140 353,141 354,141 355,142 356,142 358,142 359,142 361,141 362,141 362,140 363,140 363,139 363,140 364,141 364,142 365,143 365,145 365,146 366,146 367,146 368,145 369,145 370,144 370,143 371,141 372,139 374,136 375,133 376,130 377,128 377,126 376,125 375,124 375,123 374,123 374,122 373,122 373,121 372,121 371,121 370,121 370,122 369,123 369,125 369,126 369,128 369,130 371,133 373,135 376,137 378,138 380,138 382,138 384,138 386,137 387,136 389,136 391,136 391,134 393,133 394,133 394,132 395,132;");
        }
      
 	    function SetPenWidth() {
            SignaturePen('ctlSignature', document.getElementById('selPenW').value);
        }
        
        var isEn = true;
        function EnDis() {
            isEn = !isEn;
            SignatureEnabled('ctlSignature',isEn);
        }
        
        var statV = false;

        function StatusBar() {
            SignatureStatusBar('ctlSignature', statV);
            statV = !statV;
        }
        
        $(document).ready(function() {


            $("#color1").val("#0000FF");
        
            $('#color1').colorPicker(); 
            
            $("#color2").val("#FFFFFF");
        
            $('#color2').colorPicker(); 
            

            $('#color1').change(function() {
                var c = $('#color1').val();
                SignatureColor('ctlSignature', c);
            })
            
            $('#color2').change(function() {
                var c = $('#color2').val();
				ClearSignature('ctlSignature');
                SignatureBackColor('ctlSignature', c);
            }
            )
            
 	$("#ctlSignature_Container").resizable();

            $("#ctlSignature_Container").bind("resizestart", function(event, ui) {
                ClearSignature("ctlSignature");
            });

            $("#ctlSignature_Container").bind("resize", function(event, ui) {
                ClearSignature("ctlSignature");
            });

            $("#ctlSignature_Container").bind("resizestop", function(event, ui) {
                ResizeSignature("ctlSignature", ui.size.width, ui.size.height);
                ClearSignature("ctlSignature");
            });            
           
        }); 
    </script>

</body>
</html>