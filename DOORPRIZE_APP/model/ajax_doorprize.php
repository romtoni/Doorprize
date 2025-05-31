<?php
include("../config.php");

global $connection;

$action = $_POST["action"];
$kode_menu = $_POST["kode_menu"];

$tahun = $_POST["tahun"];
$id_event = $_POST["id_event"];
$home = $_POST["home"];

//CALL FUNCTION
if ($action == "DOORPRIZE_LIST") doorprize_menu_list($tahun,$id_event);
elseif ($action == "DOORPRIZE_SETTING") doorprize_menu_setting($kode_menu,$tahun,$id_event,$home);

function doorprize_menu_list($tahun,$id_event)
{
	global $connection;

	$doorprizeMenuJSON = array();

	$sql_jml_doorprize_menu = "SELECT
										COUNT(*) AS JML_DOORPRIZE							
									FROM
										TM_HALAMAN A
									LEFT JOIN 
										TM_HADIAH B ON B.ID_HADIAH = A.ID_HADIAH
									LEFT JOIN
										TM_EVENT C ON C.ID_EVENT = B.ID_EVENT
									WHERE
										C.ID_EVENT = '$id_event'
										AND C.TAHUN = '$tahun'";
	//echo $sql_jml_doorprize_menu;									
	$q_jml_doorprize_menu=mysqli_query($connection, $sql_jml_doorprize_menu);
	$row_jml_doorprize_menu=mysqli_fetch_array($q_jml_doorprize_menu);
	$jml_doorprize_menu = $row_jml_doorprize_menu["JML_DOORPRIZE"];
	
	if ($jml_doorprize_menu == 0)
	{
		//RESPONSE CODE GAGAL
		$status = "400";
		$message = "Tidak ada doorprize";
		
	}
	else
	{
		//RESPONSE CODE SUKSES
		$status = "200";
		$message = "";
		
       	$doorprize_menu ="<select name='list_doorprize' id='list_doorprize' onchange='javascript:ganti_halaman(this.value)'>";
		$sql = "SELECT
					C.ID_EVENT,
					C.NAMA_EVENT,
					C.TAHUN,
					B.ID_HADIAH,
					B.NAMA_HADIAH,
					A.KODE_HALAMAN,
					A.TOTAL_PEMENANG								
				FROM
					TM_HALAMAN A
				LEFT JOIN 
					TM_HADIAH B ON B.ID_HADIAH = A.ID_HADIAH
				LEFT JOIN
					TM_EVENT C ON C.ID_EVENT = B.ID_EVENT
				WHERE
					C.ID_EVENT = '$id_event'
					AND C.TAHUN = '$tahun'
				ORDER BY
					B.ID_HADIAH DESC";
	
		$q=mysqli_query($connection, $sql);
		while($row=mysqli_fetch_array($q))
		{               
			$nama_hadiah = $row['NAMA_HADIAH'];
			$kode_halaman = $row['KODE_HALAMAN'];
			
			$doorprize_menu.="<option value='$kode_halaman' >$nama_hadiah</option>";
		}
		
		$doorprize_menu.="</select>";
		$doorprize_menu.="<input type='button' id='btnback' value='CLOSE' onclick=\"javascript:close_doorprize()\">";

	}
	
	//RESPONSE DATA	
	$doorprizeMenuJSON = array("status" => $status, 
								"message" => $message, 
								"data" => $doorprize_menu);
	
	mysqli_close($connection);
	echo json_encode($doorprizeMenuJSON);
}

function doorprize_menu_setting($kode_menu,$tahun,$id_event,$home)
{
	global $connection;

	$doorprizeSettingJSON = array();
	$doorprize_setting = array();

	$sql_jml_doorprize_setting = "SELECT
									COUNT(*) AS JML_DOORPRIZE_SETTING						
								FROM
									TM_HALAMAN A
								LEFT JOIN 
									TM_HADIAH B ON B.ID_HADIAH = A.ID_HADIAH
								LEFT JOIN
									TM_EVENT C ON C.ID_EVENT = B.ID_EVENT
								WHERE
									C.ID_EVENT = '$id_event'
									AND C.TAHUN = '$tahun'
									AND A.KODE_HALAMAN = '$kode_menu'";
	$q_jml_doorprize_setting=mysqli_query($connection, $sql_jml_doorprize_setting);
	$row_jml_doorprize_setting=mysqli_fetch_array($q_jml_doorprize_setting);
	$jml_doorprize_setting = $row_jml_doorprize_setting["JML_DOORPRIZE_SETTING"];
	
	if ($jml_doorprize_setting == 0)
	{
		//RESPONSE CODE GAGAL
		$status = "400";
		$message = "Tidak ada doorprize setting";
		
	}
	else
	{
		//RESPONSE CODE SUKSES
		$status = "200";
		$message = "";
		
		
		$sql = "SELECT
					C.ID_EVENT,
					C.NAMA_EVENT,
					C.TAHUN,
					B.ID_HADIAH,
					B.NAMA_HADIAH,
					A.KODE_HALAMAN,
					A.TOTAL_PEMENANG								
				FROM
					TM_HALAMAN A
				LEFT JOIN 
					TM_HADIAH B ON B.ID_HADIAH = A.ID_HADIAH
				LEFT JOIN
					TM_EVENT C ON C.ID_EVENT = B.ID_EVENT
				WHERE
					C.ID_EVENT = '$id_event'
					AND C.TAHUN = '$tahun'
					AND A.KODE_HALAMAN = '$kode_menu'";
		$q=mysqli_query($connection, $sql);
		while($row=mysqli_fetch_array($q))
		{               
			$nama_hadiah = $row['NAMA_HADIAH'];
			$id_hadiah = $row['ID_HADIAH'];
			$total_pemenang = $row['TOTAL_PEMENANG'];
			$kode_halaman = $row['KODE_HALAMAN'];
			$nama_event = $row['NAMA_EVENT'];
			
			$doorprize_setting=array("hadiah" => $nama_hadiah, 
											"id_hadiah" => $id_hadiah, 
											"total_pemenang" => $total_pemenang,
											"kode_halaman" => $kode_halaman,
											"nama_event" => $nama_event,
											"home" => $home);
		}
	}
	
	//RESPONSE DATA	
	$doorprizeSettingJSON = array("status" => $status, 
										"message" => $message, 
										"data" => $doorprize_setting,
										"sql" => $sql);
	
	mysqli_close($connection);
	echo json_encode($doorprizeSettingJSON);
}


?>