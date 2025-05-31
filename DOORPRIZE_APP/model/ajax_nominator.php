<?php
include("../config.php");

global $connection;

$tahun = $_POST["tahun"];
$id_event = $_POST["id_event"];
$home = $_POST["home"];

//CALL FUNCTION
nominator($tahun,$id_event);

function nominator($tahun,$id_event)
{
	global $connection;
	
	$nominatorJSON = array();
	$listNominator = array();

	$sql_jml_nominator = "SELECT 
								COUNT(*) AS JML_NOMINATOR
							FROM 
								TM_NOMINATOR A
							LEFT JOIN TM_EVENT	B ON B.ID_EVENT = A.ID_EVENT
							WHERE 
								A.NIP NOT IN (SELECT 
													X.NIP 
												FROM 
													TM_PEMENANG X
												LEFT JOIN TM_EVENT Y ON Y.ID_EVENT = X.ID_EVENT
												WHERE 
													Y.TAHUN = '$tahun'
													AND Y.ID_EVENT = '$id_event')
								AND B.TAHUN = '$tahun'
								AND B.ID_EVENT = '$id_event'";
	$q_jml_nominator=mysqli_query($connection, $sql_jml_nominator);
	$row_jml_nominator=mysqli_fetch_array($q_jml_nominator);
	$jml_nominator = $row_jml_nominator["JML_NOMINATOR"];
	
	if ($jml_nominator == 0)
	{
		//RESPONSE CODE GAGAL
		$status = "400";
		$message = "Tidak ada nominator";
		
	}
	else
	{
		//RESPONSE CODE SUKSES
		$status = "200";
		$message = "";
		
		$sql = "SELECT 
					A.NIP, 
					A.NAMA,
					B.NAMA_EVENT,
					B.TAHUN
				FROM 
					TM_NOMINATOR A
				LEFT JOIN TM_EVENT	B ON B.ID_EVENT = A.ID_EVENT
				WHERE 
					A.NIP NOT IN (SELECT 
										X.NIP 
									FROM 
										TM_PEMENANG X
									LEFT JOIN TM_EVENT Y ON Y.ID_EVENT = X.ID_EVENT
									WHERE 
										Y.TAHUN = '$tahun'
										AND Y.ID_EVENT = '$id_event')
					AND B.TAHUN = '$tahun'
					AND B.ID_EVENT = '$id_event'";
		//echo $sql;
		$q=mysqli_query($connection, $sql);
		while($row=mysqli_fetch_array($q))
		{               
			$nominator=$row['NIP']."-".$row['NAMA'];
			array_push($listNominator, $nominator);
		}
	}
	
	//RESPONSE DATA	
	$nominatorJSON = array("status" => $status, 
							"message" => $message, 
							"data" => $listNominator);
	
	mysqli_close($connection);
	echo json_encode($nominatorJSON);
}
?>