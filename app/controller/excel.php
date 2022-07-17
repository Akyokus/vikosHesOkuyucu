<?php

$logs = admin::get_logs();

$out = '<table class="table" bordered="1">  
                    <tr>  
                         <th>HES KODU</th>  
                         <th>DURUMU</th>  
                         <th>SICAKLIK</th>  
                         <th>TARİH</th>
                         <th>AD-SOYAD</th>
                    </tr>
  ';
foreach ($logs as $log){
    $out .= '
    <tr>  
                         <td>'.$log["hes"].'</td>  
                         <td>'.$log["durumu"].'</td>  
                         <td>'.$log["sicaklik"].'</td>  
                         <td>'.$log["tarih"].'</td>  
                         <td>'.$log["uname"].'</td>
                    </tr>
   ';
}
$out .= '</table>';


$filename = "Loglar_".date('d-m-Y H:i:s',time()).".xls"; // dosya ismi
header("Content-type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename='.$filename);







echo $out;



