function query(){
    var hes = document.getElementById("hes_code").value;
    $.post("https://logs.hesokuyucu.com/tr/manual_query",{
        hes: hes
    },function (result){
        document.getElementById("result").innerHTML = result;
    });
}