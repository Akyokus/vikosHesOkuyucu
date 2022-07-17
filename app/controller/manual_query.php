<?php


if (post('hes')){
    $homepage = file_get_contents('http://213.128.68.165/HESWS/Query/30073912870/merovski.250599/'.post('hes'));


    $obj = json_decode($homepage);


    $data = [
        'chipid' => users::userExist(session('admin_email'))['chipid'],
        'sicaklik' => 'ManuelGiriş',
        'durumu' => $obj->{'riskDurumu'},
        'hes' => post('hes'),
        'uname' => $obj->{'adSoyad'},
        'gecerli' => $obj->{'gecerlilikZamani'},
        'tc' => $_SESSION['tc']= $obj->{'tckn'}
    ];

    query_save::save($data);
    echo '
        HES KODU         : '.post("hes").' <br>
        RİSK DURUMU      : '.$obj->{"riskDurumu"}.' <br>
        AD SOYAD         : '.$obj->{"adSoyad"}.' <br>
        TC KİMLİK        : '.$obj->{"tckn"}.' <br>
        GEÇERLİLİK SÜRESİ: '.$obj->{"gecerlilikZamani"}.'
    ';



    exit();
}


require view('manual');