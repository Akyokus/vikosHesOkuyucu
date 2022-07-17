var url = "https://logs.hesokuyucu.com/tr/";


function selectdevice(id){
	var device = document.getElementById("device"+id).value;
	alert(device);
	var con = confirm("Cihazı seçtiğiniz kullanıcıya tanımlamak ister misiniz ?");
	if(con === true){
		$.post(url+"customer_list", {add_id:id,device_id:device}, function(result){
						if(result == 1){
							alert("Cihaz Başarıyla eklendi!");	
						}else{
							alert("Bir sorun oluştu! Lütfen tekrar deneyiniz.");
						}  
                        });
	}else{
		alert("İşleminiz iptal edilmiştir.");
	}
	
}
function func(id){
	$.post(url+"driver_list", {id:id}, function(result){
                       	document.getElementById('edit'+id).innerHTML =result;     
                        });

}
function funcU(id){
	$.post(url+"customer_list", {id:id}, function(result){
		document.getElementById('edit'+id).innerHTML =result;     
                        });

}
function edit(id){
	var chipid = document.getElementById("chipid|"+id).value;
	var ssid = document.getElementById("ssid|"+id).value;
	var sinyal = document.getElementById("sinyal|"+id).value;
	var ses = document.getElementById("ses|"+id).value;
	var guncel = document.getElementById("guncel|"+id).value;
	var ilk_gorulme = document.getElementById("ilk_gorulme|"+id).value;
	var son_gorulme = document.getElementById("son_gorulme|"+id).value;
	var bekleyen_islem = document.getElementById("bekleyen_islem|"+id).value;
	
	$.post(url+"driver_list", {chipid:chipid,ssid:ssid,sinyal:sinyal,ses:ses,guncel:guncel,ilk_gorulme:ilk_gorulme,son_gorulme:son_gorulme,bekleyen_islem:bekleyen_islem}, function(result){
                     
                       	document.getElementById('edit'+id).innerHTML =result;     
                        });
}

function editU(id){
	var uname = document.getElementById("uname|"+id).value;
	var email = document.getElementById("email|"+id).value;
	var telno = document.getElementById("telno|"+id).value;
	
	$.post(url+"customer_list", {save_edit:id,uname:uname,email:email,telno:telno}, function(result){
                     
                       	//document.getElementById('edit'+id).innerHTML =result;     
                        });
}


