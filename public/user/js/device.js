var url = "https://logs.hesokuyucu.com/tr/";

setInterval(function(){
	var user_id = document.getElementById("hsgdftfarvdAS").value;

	$.post(url+"driver_list", {getDevice:1,user_id}, function(result){
		//var j =JSON.parse(result);
		//alert("dasda");
		//alert(document.getElementById('dataTable').getElementsByTagName('tbody')[0].innerHTML);
		 document.getElementById('dataTableDevice').getElementsByTagName('tbody')[0].innerHTML = result;
				
		
                        });
},1000);