var randomize;
var id_hadiah = "";
var total_pemenang = "";
var kode_home;

function jsrandom()
{
	$('#kolom_list_doorprize').addClass("kolom_putih");
	$('#kolom_random_1').addClass("kolom_putih");
	$('#kolom_random_2').addClass("kolom_putih");

	var txtnominator_list = $('#txtnominator_list').val();
	if (txtnominator_list == "[]") 
	{
		 alert("Maaf, sudah tidak ada nominator lagi"); 
		 $('#btnstop').click(); 
	}
	else
	{
		var txtnominator_list = txtnominator_list.replace('[','',txtnominator_list);
		var txtnominator_list = txtnominator_list.replace(']','',txtnominator_list);
		var txtnominator_list = txtnominator_list.replace(/"/g,'',txtnominator_list);
	
		var nominator = txtnominator_list.split(",");
		var jmldata = (nominator.length - 1);
		var array_nominator = [];
		
		for (i=0; i<=jmldata; i++) array_nominator.push(nominator[i]);
		var rand = array_nominator[Math.floor(Math.random() * array_nominator.length)];
		
		//$('#lblnominator').html(rand);
		//$('#txtnominator').val(rand);
		var rand_split = rand.split("-");

		$('#lblnominator_1').html(rand_split[1]);
		$('#txtnominator_1').val(rand_split[1]);
		
		$('#lblnominator_2').html(rand_split[0]);
		$('#txtnominator_2').val(rand_split[0]);
	}
}

function ambil_nominator()
{
	var tahun = $('#tahun').val();
	var id_event = $('#id_event').val();
	var home = $('#home').val();
	
	//alert(tahun);
	//alert(id_event);
	//alert(home);

	var nominatorJSON;
	var response;
	
	$.ajax({
		type: 'POST',
		url: '../model/ajax_nominator.php',
		data: {tahun:tahun,id_event:id_event,home:home},
		dataType: 'text',
		cache: false,
		success: function(result) {
			//alert(result);
			//$('#lblnominator_list').html(result[0]);
			$('#lblmessage').html('');
			response=JSON.parse(result);
			nominatorJSON = response["data"];
			$('#txtnominator_list').val(nominatorJSON);
		},
		error: function(result) {
			alert("error ambil_nominator");
		},
	});
}

function ambil_doorprize_menu()
{
	var tahun = $('#tahun').val();
	var id_event = $('#id_event').val();
	var home = $('#home').val();
	
	//alert(tahun);
	//alert(id_event);
	//alert(home);
	
	var action = "DOORPRIZE_LIST";
	var kode_menu = "";

	var doorprizeJSON;
	var response;
	
	$.ajax({
		type: 'POST',
		url: '../model/ajax_doorprize.php',
		data: {tahun:tahun,id_event:id_event,home:home,kode_menu:kode_menu,action:action},
		dataType: 'text',
		cache: false,
		success: function(result) {
			///alert(result);

			response=JSON.parse(result);
			doorprizeJSON = response["data"];
			//alert(doorprizeJSON);
			$('#list_doorprize_menu').html(doorprizeJSON);

		},
		error: function(result) {
			alert("error ambil_doorprize_menu");
		},
	});
}

function ambil_doorprize_setting(halaman_param)
{
	$('#lblmessage').html("");
	
	var tahun = $('#tahun').val();
	var id_event = $('#id_event').val();
	var home = $('#home').val();
	
	//alert(tahun);
	//alert(id_event);
	//alert(home);
	
	var action = "DOORPRIZE_SETTING";
	var kode_menu = halaman_param;
	if (kode_menu === "") kode_menu = "index";
	
	//alert(kode_menu);
	
	var doorprizeSettingJSON;
	var nama_hadiah;
	var response;
	
	$.ajax({
		type: 'POST',
		url: '../model/ajax_doorprize.php',
		data: {tahun:tahun,id_event:id_event,home:home,kode_menu:kode_menu,action:action},
		dataType: 'text',
		cache: false,
		success: function(result) {
			//alert(response);

			response=JSON.parse(result);
			doorprizeSettingJSON = response["data"];

			nama_hadiah = doorprizeSettingJSON["hadiah"];
			id_hadiah = doorprizeSettingJSON["id_hadiah"];
			total_pemenang = doorprizeSettingJSON["total_pemenang"];
			kode_halaman = doorprizeSettingJSON["kode_halaman"];
			nama_event = doorprizeSettingJSON["nama_event"];
			kode_home = doorprizeSettingJSON["home"];
			
			//sql = response["sql"];
			//alert(sql);
			
			kode_halaman_sebelumnya = $('#kode_halaman_sebelumnya').val();

			//console.log(response);
			
			$('#nama_event').html(nama_event);
			$('#hadiah').val(nama_hadiah);
			$('#id_hadiah').val(id_hadiah);
			$('#total_pemenang').val(total_pemenang);
			
			id_hadiah = $('#id_hadiah').val();
			total_pemenang = $('#total_pemenang').val();

			//alert("bg_"+kode_home+"_"+kode_halaman_sebelumnya);
			
			$('#body_page').removeClass("bg_"+kode_home+"_"+kode_halaman_sebelumnya).addClass("bg_"+kode_home+"_"+kode_halaman);
			$('#kode_halaman_sebelumnya').val(kode_halaman);
			
			open_pemenang();

		},
		error: function(result) {
			alert("error ambil_doorprize_setting");
		},
	});
}

function insert_pemenang()
{
	var action = "INSERT";

	var tahun = $('#tahun').val();
	var id_event = $('#id_event').val();
	var home = $('#home').val();
	
	//alert(tahun);
	//alert(id_event);
	//alert(home);
	
	var pemenangJSON;
	var lastPemenangJSON;
	var response;
	var pemenang;
	var txtPemenang;
	var jmlPemenang;
	var lastPemenang;
	var txtPemenangLast;
	var status;
	var message;
	var txtMessage;

	$.ajax({
		type:'POST',
		data:{tahun:tahun,id_event:id_event,home:home,id_hadiah:id_hadiah,total_pemenang:total_pemenang,action:action},
		url:"../model/ajax_pemenang.php", //php page URL where we post this data to save in databse
		dataType: 'text',
		cache: false,
		success: function(result)
		{
			//alert(result);
			response=JSON.parse(result);
			//alert(response);

			message = response["message"];
			status = response["status"];
			//alert(status);
			if (status === "200")
			{
				//LIST PEMENANG
				pemenangJSON = response["data"];
				//alert(pemenangJSON);
				jmlPemenang = pemenangJSON.length;
				txtPemenang = "<ol class='font_list'>";
				for (i = 0; i < jmlPemenang; i++) 
				{
					pemenang = pemenangJSON[i].split("-");
					
					txtPemenang += "<li>" + pemenang[2]+" ("+pemenang[1]+")" + "</li>";
				}
				txtPemenang += "</ol>";

				$('#list_pemenang').html('');
				$('#list_pemenang').html(txtPemenang);
				
				//PEMENANG TERAKHIR
				lastPemenangJSON = response["data"][total_pemenang-1];
				lastPemenang = lastPemenangJSON.split("-");

				//$('#lblnominator').html('');
				//$('#lblmessage').html('');
				
				if (jmlPemenang == 1) txtPemenangLast = "Pemenangnya adalah "+lastPemenang[2]+" ("+lastPemenang[1]+")";
				else txtPemenangLast = "Pemenangnya adalah "+lastPemenang[2]+" ("+lastPemenang[1]+"), dkk";

				$('#lblmessage').html('');
				//$('#lblmessage').html(txtPemenangLast);
				
				$('#lblnominator_1').html(lastPemenang[2]);
				$('#lblnominator_2').html(lastPemenang[1]);

			}
			else
			{
				//$('#lblnominator').html('');
				$('#lblnominator_1').html('');
				$('#lblnominator_2').html('');
				$('#kolom_random_1').removeClass("kolom_putih");
				$('#kolom_random_2').removeClass("kolom_putih");
				
				$('#lblmessage').html('');
				$('#lblmessage').html(message);
				$("#footer").addClass("kolom_merah");
			}
		},
		error: function(result) {
			alert("error insert_pemenang");
		},
	})
}

function open_pemenang()
{
	var action = "OPEN";

	var tahun = $('#tahun').val();
	var id_event = $('#id_event').val();
	var home = $('#home').val();
	
	//alert(tahun);
	//alert(id_event);
	//alert(home);

	var pemenangJSON;
	var lastPemenangJSON;
	var response;
	var pemenang;
	var txtPemenang;
	var jmlPemenang;

	$.ajax({
		type:'POST',
		data:{tahun:tahun,id_event:id_event,home:home,id_hadiah:id_hadiah,total_pemenang:total_pemenang,action:action},
		url:"../model/ajax_pemenang.php", //php page URL where we post this data to save in databse
		dataType: 'text',
		cache: false,
		success: function(result)
		{
			response=JSON.parse(result);
			pemenangJSON = response["data"];
			ststus = response["status"];
			//alert(status);

			jmlPemenang = pemenangJSON.length;
			txtPemenang = "<ol class='font_list'>";
			for (i = 0; i < jmlPemenang; i++) 
			{
				pemenang = pemenangJSON[i].split("-");
				
				txtPemenang += "<li>" + pemenang[2]+" ("+pemenang[1]+")" + "</li>";
			}
			txtPemenang += "</ol>";
			
			
			$('#list_pemenang').html('');
			$('#list_pemenang').html(txtPemenang);
	
		},
		error: function(result) {
			alert("error open_pemenang");
		},
	})
}

function ganti_halaman(halaman_param)
{
	$('#kolom_random_1').removeClass("kolom_putih");
	$('#kolom_random_2').removeClass("kolom_putih");
	$('#lblnominator_1').html('');
	$('#lblnominator_2').html('');
	$("#footer").removeClass("kolom_merah");
	
	var halaman = halaman_param;
	ambil_doorprize_setting(halaman);
}

function close_doorprize()
{
	var isok=confirm("INGIN MENUTUP HALAMAN DOORPRIZE?");
	
	if (isok==true)
	{
		window.location.href="../view/app_event.php";
	}
}

$(document).ready(function(e) 
{
	ambil_doorprize_menu();
	ambil_doorprize_setting("index");

	open_pemenang();
	
	$("#btnstop").css("display","none");
	$("#btnstart").css("display","none");
	
	kode_home = $('#home').val();
	$('#list_doorprize_menu').css("display","none");

	alert ("SELAMAT DATANG");
	$('#list_doorprize_menu').css("display","block");
	$('#kolom_list_doorprize').addClass("kolom_putih");


	//alert (kode_home);
	$("#btnstart").removeClass("btnstart_css");
	$("#btnstop").removeClass("btnstop_css");
	
	$("#btnstart").addClass(kode_home+"_btnstart_css");
	$("#btnstop").addClass(kode_home+"_btnstop_css");
	
	$("#btnstop").css("display","none");
	$("#btnstart").css("display","block");
	

	$('#btnstart').click(function(){
		
		//alert (kode_home);
		$("#list_doorprize").prop('disabled', true);
		$("#footer").removeClass("kolom_merah");

		var kode_halaman_skrg = $("#kode_halaman_sebelumnya").val();
		//alert(kode_halaman_skrg);
		
		if (kode_halaman_skrg === "" || kode_halaman_skrg === "index")
		{
			alert("PILIH SALAH SATU DOORPRIZE!!");
			$("#list_doorprize").prop('disabled', false);

		}
		else
		{
			ambil_nominator(); //AMBIL DAFTAR NOMINATOR
			randomize = setInterval(function(){ jsrandom(); }, 1); //ACAK DATA
			
			$("#btnstart").addClass(kode_home+"_btnstart_css");
			$("#btnstop").addClass(kode_home+"_btnstop_css");
				
			$("#btnstop").css("display","block");
			$("#btnstart").css("display","none");
		}
	});

	$('#btnstop').click(function(){
		$("#list_doorprize").prop('disabled', false);
		
		clearInterval(randomize); //STOP PENGACAKAN DATA
		insert_pemenang(); //MASUKKAN PEMENANG KE TABEL
	
		$("#btnstart").addClass(kode_home+"_btnstart_css");
		$("#btnstop").addClass(kode_home+"_btnstop_css");

		$("#btnstop").css("display","none");
		$("#btnstart").css("display","block");
	});
});