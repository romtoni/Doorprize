var kode_home;
var id_event;

function ambil_event_menu()
{
	var action = "EVENT_LIST";
	var id_event = "";

	var eventJSON;
	var response;
	
	$.ajax({
		type: 'POST',
		url: '../model/ajax_event.php',
		data: {id_event:id_event,action:action},
		dataType: 'text',
		cache: false,
		success: function(result) {
			response=JSON.parse(result);
			eventJSON = response["data"];
			//console.log(eventJSON);
			$('#list_event_menu').html(eventJSON);
		},
		error: function(result) {
			alert("error ambil_event_menu");
		},
	});
}

function ambil_event_setting(id_event_param)
{
	var action = "EVENT_SETTING";
	var id_event = id_event_param;
	//alert (id_event);
	var eventSettingJSON;
	var response;
	
	$.ajax({
		type: 'POST',
		url: '../model/ajax_event.php',
		data: {id_event:id_event,action:action},
		dataType: 'text',
		cache: false,
		success: function(result) {
			response=JSON.parse(result);
			//alert(response);
			eventSettingJSON = response["data"];

			id_event = eventSettingJSON["id_event"];
			nama_event = eventSettingJSON["nama_event"];
			tahun = eventSettingJSON["tahun"];
			kode_home = eventSettingJSON["home"];

			//console.log(response);
			$('#nama_event').val(nama_event);
			$('#id_event').val(id_event);
			$('#tahun').val(tahun);
			$('#kode_home').val(kode_home);
			
		},
		error: function(result) {
			alert("error ambil_event_setting");
		},
	});
}

function open_doorprize()
{
	var id_event = $('#id_event').val();
	var tahun = $('#tahun').val();
	var kode_home = $('#kode_home').val();

	if (id_event==="" ||  id_event==="" || id_event==="")
	{
		alert("PILIH SALAH SATU EVENT!!");
	}
	else
	{
		var params = "id_event="+id_event+"&tahun="+tahun+"&home="+kode_home;
		window.location.href="../view/app_doorprize.php?"+params;
	}
}

$(document).ready(function(e) 
{
	ambil_event_menu();

	kode_home = $('#kode_home').val();
	//alert (kode_home);

	$('#btnopen').click(function(){
		open_doorprize();		
	});

});