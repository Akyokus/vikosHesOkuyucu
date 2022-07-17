var url = "https://logs.hesokuyucu.com/tr/";

var interval = setInterval(function(){
	var user_id = document.getElementById("hsgdftfarvdAS").value;
	$.post(url+"logs", {getDevice:1,user_id}, function(result){
		//var j =JSON.parse(result);
		//alert("dasda");
		//alert(document.getElementById('dataTable').getElementsByTagName('tbody')[0].innerHTML);
		 document.getElementById('dataTable').getElementsByTagName('tbody')[0].innerHTML = result;
                        });
},1000);

function getLogs(){
	var user_id = document.getElementById("hsgdftfarvdAS").value;
	var date = document.getElementById("start").value;
	$.post(url+"logs",{date:date,user_id:user_id},function(result){
		//alert(result);
		document.getElementById('dataTable').getElementsByTagName('tbody')[0].innerHTML = result;
	});
	clearInterval(interval);
}
$(document).ready(function(){
var date = new Date();
	$("#setExcel").click(function(){
		$("#dataTable").table2excel({
			name: "LOGLAR", // Çalışma sayfası adı - Worksheet
			filename: "LOGLAR "+date.getDay()+"/"+date.getMonth()+"/"+date.getFullYear()+"/"+date.getTime()+".xls" // Dosya Adı
		});
	})

});