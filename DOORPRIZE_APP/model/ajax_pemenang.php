<?php
include("../config.php");

global $connection;

//PARAMETER
$id_hadiah = $_POST["id_hadiah"];
$total_pemenang = $_POST["total_pemenang"];
$action = $_POST["action"];

$tahun = $_POST["tahun"];
$id_event = $_POST["id_event"];
$home = $_POST["home"];
$user_create = "PENGUNDI";

//CALL FUNCTION	
if ($action == "OPEN") 
{
	open_pemenang($id_hadiah,$tahun,$id_event);
	
}
elseif ($action == "INSERT") 
{
	insert_pemenang($id_hadiah, $total_pemenang,$tahun,$id_event, $user_create);
}

function open_pemenang($id_hadiah,$tahun,$id_event)
{
	global $connection;
	
	$pemenangJSON = array();
	$listPemenang = array();
	
	//RESPONSE CODE SUKSES
	$status = "200";
	$message = "";
	
	//AMBIL LIST PEMENANG
	$sql_list_pemenang = "SELECT 
								A.NIP, 
								A.NAMA
							FROM 
								TM_PEMENANG A
							LEFT JOIN TM_EVENT	B ON B.ID_EVENT = A.ID_EVENT
							WHERE 
								A.ID_EVENT = '$id_event'
								AND A.ID_HADIAH = '$id_hadiah'
								AND B.TAHUN = '$tahun'";
	$q_list_pemenang = mysqli_query($connection,$sql_list_pemenang);
	$no = 0;
	while($row_list_pemenang = mysqli_fetch_array($q_list_pemenang))
	{
		$no++;
		$pemenang=$no."-".$row_list_pemenang['NIP']."-".$row_list_pemenang['NAMA'];
		array_push($listPemenang, $pemenang);
	}
		

	//RESPONSE DATA	
	$pemenangJSON = array("status" => $status, 
							"message" => $message, 
							"data" => $listPemenang);
	
	mysqli_close($connection);
	echo json_encode($pemenangJSON);
	
}

	
function insert_pemenang($id_hadiah, $total_pemenang,$tahun,$id_event, $user_create)
{
	global $connection;

	$pemenangJSON = array();
	$listPemenang = array();

	//CHECK HADIAH
	$sql_hadiah = "SELECT 
						A.NAMA_HADIAH,
						A.MAX_JML,
						B.NAMA_EVENT,
						B.TAHUN
					FROM 
						TM_HADIAH A
					LEFT JOIN TM_EVENT B ON B.ID_EVENT = A.ID_EVENT
					WHERE 
						B.TAHUN = '$tahun'
						AND B.ID_EVENT = '$id_event'
						AND A.ID_HADIAH = '$id_hadiah'";
	
	$q_hadiah = mysqli_query($connection,$sql_hadiah);
	$row_hadiah = mysqli_fetch_array($q_hadiah);
	
	$nama_hadiah = $row_hadiah["NAMA_HADIAH"];
	$max_jml_hadiah = $row_hadiah["MAX_JML"];
	
	$sql_total_pemenang = "SELECT
								COUNT(*) AS TOTAL_PEMENANG_SKRG
							FROM
								TM_PEMENANG A
						 	LEFT JOIN TM_EVENT	B ON B.ID_EVENT = A.ID_EVENT
							WHERE 
								 A.ID_HADIAH = '$id_hadiah'
								AND B.ID_EVENT = '$id_event'
								AND B.TAHUN = '$tahun'";
	$q_total_pemenang = mysqli_query($connection,$sql_total_pemenang);
	$row_total_pemenang = mysqli_fetch_array($q_total_pemenang);							
	$total_pemenang_skrg = $row_total_pemenang["TOTAL_PEMENANG_SKRG"];
	
	if ($total_pemenang_skrg < $max_jml_hadiah)
	{
		//RESPONSE CODE SUKSES
		$status = "200";
		$message = "";
		
		$sql_prioritas = "SELECT
								PRIORITAS
							FROM
								TM_EVENT 
							WHERE 
								ID_EVENT = '$id_event'
								AND TAHUN = '$tahun'";
		$q_prioritas = mysqli_query($connection,$sql_prioritas);
		$row_prioritas = mysqli_fetch_array($q_prioritas);
		$flag_prioritas = $row_prioritas["PRIORITAS"];
		
		if ($flag_prioritas == "Y") 
		{

			$cond_prioritas = " AND A.NIP IN (SELECT 
												NIP 
											FROM 
												TM_NOMINATOR_PRIORITAS 
											WHERE 
												TAHUN = B.TAHUN 
												AND ID_EVENT = B.ID_EVENT)";
		}
		else
		{
			$sql_prioritas_perhadiah = "SELECT
											PRIORITAS
										FROM
											TM_HADIAH 
										WHERE 
											ID_EVENT = '$id_event'
											AND ID_HADIAH = '$id_hadiah'";
			$q_prioritas_perhadiah = mysqli_query($connection,$sql_prioritas_perhadiah);
			$row_prioritas_perhadiah = mysqli_fetch_array($q_prioritas_perhadiah);
			$flag_prioritas_perhadiah = $row_prioritas_perhadiah["PRIORITAS"];
			
			if ($flag_prioritas_perhadiah == "Y")
			{
				$cond_prioritas = " AND A.NIP IN (SELECT 
													NIP 
												FROM 
													TM_NOMINATOR_PRIORITAS 
												WHERE 
													TAHUN = B.TAHUN 
													AND ID_EVENT = B.ID_EVENT)";
			} 
			else $cond_prioritas = "";
		}
		
		//INSERT PEMENANG
		$sql_pemenang = "INSERT INTO TM_PEMENANG(NIP, NAMA, ID_HADIAH, ID_EVENT, KETERANGAN, TGL_CREATE, USER_CREATE)
							SELECT
									A.NIP, 
									A.NAMA, 
									'$id_hadiah' AS ID_HADIAH, 
									'$id_event' AS ID_EVENT, 
									'$nama_hadiah' AS NAMA_HADIAH, 
									now() AS TGL_CREATE, 
									'$user_create' AS USER_CREATE
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
								AND B.ID_EVENT = '$id_event'
								$cond_prioritas
							ORDER BY RAND()
							LIMIT $total_pemenang";
		$q_pemenang = mysqli_query($connection,$sql_pemenang);
		
		//AMBIL LIST PEMENANG
		$sql_list_pemenang = "SELECT 
									A.NIP, 
									A.NAMA
								FROM 
									TM_PEMENANG A
								LEFT JOIN TM_EVENT	B ON B.ID_EVENT = A.ID_EVENT
								WHERE 
									A.ID_EVENT = '$id_event'
									AND A.ID_HADIAH = '$id_hadiah'
									AND B.TAHUN = '$tahun'
								ORDER BY
									A.ID_PEMENANG DESC";
		//echo $sql_list_pemenang;							
		$q_list_pemenang = mysqli_query($connection,$sql_list_pemenang);
		$no = 0;
		while($row_list_pemenang = mysqli_fetch_array($q_list_pemenang))
		{
			$no++;
			$pemenang=$no."-".$row_list_pemenang['NIP']."-".$row_list_pemenang['NAMA'];
			array_push($listPemenang, $pemenang);
		}
	}
	else 
	{
		//RESPONSE CODE GAGAL
		$status = "400";
		$message = "Maaf, total pemenang untuk hadiah ".$nama_hadiah." sudah maksimal";
	}
	//RESPONSE DATA	
	$pemenangJSON = array("status" => $status, 
							"message" => $message, 
							"data" => $listPemenang);
	mysqli_close($connection);
	echo json_encode($pemenangJSON);

}		
?>