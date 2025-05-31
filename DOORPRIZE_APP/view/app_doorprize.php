<html>
<head>
<script type = "text/javascript" src = "../lib/jquery-3.3.1.min.js"></script>
<script type = "text/javascript" src = "../controller/js_doorprize.js"></script>
<link href="../style.css" rel="stylesheet">
<title id="nama_event"></title>
</head>
<body id="body_page" class="bg_index">
<input type="hidden" id="hadiah">
<input type="hidden" id="id_hadiah">
<input type="hidden" id="total_pemenang">
<input type="hidden" id="kode_halaman_sebelumnya">
<input type="hidden" id="kode_home">

<input type="hidden" id="tahun" value="<?=$_GET["tahun"]?>">
<input type="hidden" id="id_event"  value="<?=$_GET["id_event"]?>">
<input type="hidden" id="home"  value="<?=$_GET["home"]?>">

<table width="100%" border="0" class="d">
    <tr>
        <td width="72%" align="right">
         <br>
            <br>
            <label class="font_title">&nbsp;</label>
            <br>
            <br>
            <br>
        </td>
        <td width="28%" align="left">&nbsp;</td>
    </tr>
   <tr>
        <td  colspan="2" align="center">
            <table width="100%"  border="0">
                <tr>
                    <td width="30%" align="center" valign="top">&nbsp;</td>
                    <td width="5%" align="center" valign="top">&nbsp;</td>
                    <td width="30%" align="center">
                        <a href="#"><img class="btnstart_css" id="btnstart"></a>
                        <a href="#"><img class="btnstop_css" id="btnstop"></a>
                    </td>
                    <td width="5%" align="center" valign="top">&nbsp;</td>
                    <td width="30%" align="left" valign="top">&nbsp;</td>
                </tr>
				<tr>
					<td width="30%" align="center" valign="top">&nbsp;</td>
                    <td width="5%" align="center" valign="top">&nbsp;</td>
                    <td width="30%" align="center" id='kolom_list_doorprize'>
                        <label id="list_doorprize_menu"></label>
                    </td>
                    <td width="5%" align="center" valign="top">&nbsp;</td>
                    <td width="30%" align="left" valign="top">&nbsp;</td>
				</tr>
				<tr>
					<td width="30%" align="center" valign="top">&nbsp;</td>
                    <td width="5%" align="center" valign="top">&nbsp;</td>
                    <td width="30%" align="center" id='kolom_random_1' >
						<label id="lblnominator_1"  class="font_title">&nbsp;</label>
                    </td>
                    <td width="5%" align="center" valign="top">&nbsp;</td>
                    <td width="30%" align="left" valign="top">&nbsp;</td>
				</tr>
				<tr>
					<td width="30%" align="center" valign="top">&nbsp;</td>
                    <td width="5%" align="center" valign="top">&nbsp;</td>
                    <td width="30%" align="center" id='kolom_random_2'>
						<label id="lblnominator_2"  class="font_title">&nbsp;</label>
                    </td>
                    <td width="5%" align="center" valign="top">&nbsp;</td>
                    <td width="30%" align="left" valign="top">&nbsp;</td>
				</tr>
				
        	</table>
        </td>
	</tr>
</table>
<table id='footer' >
	<tr>
		<td align='center' >
				<input type="hidden"  id="txtnominator_list" name="txtnominator_list" />
				<input type="hidden"  id="txtnominator" name="txtnominator" />
				
                <!--<label id='list_pemenang'></label>-->
				<!--<label id="lblnominator"  class="font_title">&nbsp;</label>-->
                <!--<label id="lblnominator_list"></label>-->
				<label id="lblmessage" class="font_message"></label>
		</td>
	</tr>
</table>
</body>
</html>