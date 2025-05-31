<?php
include("../config.php");

global $connection;

$action = $_POST["action"];
$id_event = $_POST["id_event"];

//CALL FUNCTION
if ($action == "EVENT_LIST") event_list();
elseif ($action == "EVENT_SETTING") event_setting($id_event);

function event_list()
{
	global $connection;

	$eventMenuJSON = array();

	$sql_jml_event = "SELECT
							COUNT(*) AS JML_EVENT							
						FROM
							TM_EVENT";
	$q_jml_event=mysqli_query($connection, $sql_jml_event);
	$row_jml_event=mysqli_fetch_array($q_jml_event);
	$jml_event = $row_jml_event["JML_EVENT"];
	
	if ($jml_event == 0)
	{
		//RESPONSE CODE GAGAL
		$status = "400";
		$message = "Tidak ada event";
		
	}
	else
	{
		//RESPONSE CODE SUKSES
		$status = "200";
		$message = "";
		
       	$event_menu ="<select name='list_event' id='list_event' onchange='javascript:ambil_event_setting(this.value)'>";
		$event_menu.="<option value='' >--PILIH EVENT--</option>";
		$sql = "SELECT
					ID_EVENT,
					NAMA_EVENT					
				FROM
					TM_EVENT
				ORDER BY
					ID_EVENT DESC";
	
		$q=mysqli_query($connection, $sql);
		while($row=mysqli_fetch_array($q))
		{               
			$id_event = $row['ID_EVENT'];
			$nama_event = $row['NAMA_EVENT'];
			
			$event_menu.="<option value='$id_event'>$nama_event</option>";
		}
		
		$event_menu.="</select>";

	}
	
	//RESPONSE DATA	
	$eventMenuJSON = array("status" => $status, 
							"message" => $message, 
							"data" => $event_menu);
	
	mysqli_close($connection);
	echo json_encode($eventMenuJSON);
}

function event_setting($id_event)
{
	global $connection;
	global $home;
	
	$eventSettingJSON = array();
	$event_setting = array();

	$sql_jml_event_setting = "SELECT
									COUNT(*) AS JML_EVENT							
								FROM
									TM_EVENT
								WHERE
									ID_EVENT = '$id_event'";
	$q_jml_event_setting=mysqli_query($connection, $sql_jml_event_setting);
	$row_jml_event_setting=mysqli_fetch_array($q_jml_event_setting);
	$jml_event_setting = $row_jml_event_setting["JML_EVENT"];
	
	if ($jml_event_setting == 0)
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
					ID_EVENT,
					NAMA_EVENT,
					TAHUN,
					HOME
				FROM
					TM_EVENT
				WHERE
					ID_EVENT = '$id_event'";
		$q=mysqli_query($connection, $sql);
		$row=mysqli_fetch_array($q);
		
		$id_event = $row['ID_EVENT'];
		$nama_event = $row['NAMA_EVENT'];
		$tahun = $row['TAHUN'];
		$home = $row['HOME'];
		
		$event_setting=array("id_event" => $id_event, 
							"nama_event" => $nama_event, 
							"tahun" => $tahun,
							"home" => $home);
	}
	
	//RESPONSE DATA	
	$eventSettingJSON = array("status" => $status, 
								"message" => $message, 
								"data" => $event_setting);
	
	mysqli_close($connection);
	echo json_encode($eventSettingJSON);
}
?>