<html>
<head>
<script type = "text/javascript" src = "../lib/jquery-3.3.1.min.js"></script>
<script type = "text/javascript" src = "../controller/js_event.js"></script>
<link href="../style.css" rel="stylesheet">
<title id="nama_event">DOORPRIZE BHINNEKA LIFE INDONESIA</title>
</head>
<body id="body_page" class="bg_index">
<input type="hidden" id="nama_event">
<input type="hidden" id="id_event">
<input type="hidden" id="tahun">
<input type="hidden" id="kode_home">
<table width="100%" border="0" class="d">
    <tr>
        <td width="30%" align="right" >
         <br>
            <br>
            <label class="font_title">&nbsp;</label>
            <br>
            <br>
            <br>
        </td>
        <td width="40%" align="center" >
        	<table width="100%">
                <tr>
                    <td align="center" >
                    	
                        <br><br><br><br><br><br><br><br>
           				<!--
                        <label class="font_title">LIST EVENT</label>
                        -->
                    </td>
                </tr>
                <tr>
                    <td align="center"><!--<hr>--></td>
                </tr>
                <tr>
                  <td  align="center" valign="middle">
                  	<table width="100%" border="3">
                    <tr>
                    <td  bgcolor="#CCCCCC" bordercolor="#FFFFFF" align="center" bordercolorlight="#FFFFFF" bordercolordark="#000000">
                  	<label id='list_event_menu'></label><input type="button" value="OPEN" id="btnopen" name="btnopen">
                    </td>
                    </tr>
                    </table>
                  </td>
                </tr>
            </table>
        </td>
        <td width="30%" align="left"></td>
    </tr>
    <tr>
         <td  colspan="3" align="center">
            <table width="100%">
                <tr>
                    <td width="30%" align="center" valign="top">&nbsp;</td>
                    <td width="5%" align="center" valign="top">&nbsp;</td>
                    <td width="30%" align="center">&nbsp;</td>
                    <td width="5%" align="center" valign="top">&nbsp;</td>
                    <td width="30%" align="left" valign="top">
                    <table>
						<tr>
                        	<td align="left" valign="top"><br><br><br>
            					<label class="font_title">&nbsp;</label>
                            </td>
                        </tr>
                        <tr>
                        	<td align="left" valign="top">&nbsp;</td>
                        </tr>
                        <tbody id='list_pemenang' valign="top">
                        </tbody>
                    </table>
                    </td>
                </tr>
        	</table>
        </td>
	</tr>
</table>
</body>
</html>