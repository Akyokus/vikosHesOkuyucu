<?php


if ($_SESSION["admin_email"]){

	if(post('create_taxi')){
		
		$email = post('email');
        $name = post('uname');
        $password = post('password');
        $repassword = post('re_password');
		$plaka = post('plaka');
		$marka = post('marka');
		$model = post('model');

        if (!$name) {
            $error = 'Lütfen isminizi giriniz.';
        } elseif (!$email) {
            $error = 'Lütfen mail adresinizi giriniz.';
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Lütfen geçerli bir mail adresi giriniz.';
        } elseif (!$password || !$repassword) {
            $error = 'Lütfen şifrenizi giriniz.';
        } elseif (!($password === $repassword)) {
            $error = 'Girdiğiniz şifreler aynı değil.';
        } elseif (!$plaka) {
            $error = 'Lütfen araç plakasını giriniz.';
        }
		elseif (!$marka) {
            $error = 'Lütfen araç markasını giriniz.';
        }
		elseif (!$model) {
            $error = 'Lütfen araç modelini giriniz.';
        }elseif ((strlen($name)) < 2) {
            $error = 'Lütfen gerçek adınızı giriniz.';
        } else {


            $data = [
                'uname' => post('uname'),
                'email' => post('email'),
                'telno' => post('telno'),
                'password' => md5(post('password')),
				'plate' => post('plaka'),
					'marka' => post('marka'),
					'model' => post('model')
            ];
//        damp($data);



            $row = drivers::driverExist($email);
            if ($row != false) {

                $error = 'Bu mail adresiyle daha önce zaten bir üyelik var!';
            } else {

                $result = drivers::register($data);

                if ($result == true){

                    $success = 'Taksi şoförü başarıyla oluşturuldu, Yönlendiriliyorsunuz...';

                   
                    header('Refresh:1;url=' . site_url('index'));
                } else {
                    damp('veritabaı');
                    $error = 'Veritabanı hatası';
                }
            }
        }

    
}
	if($_SESSION["yetki"]=="admin"){
		$uname = admin::get_name($_SESSION['admin_email']);
		require view('index');
		
	}else{
		$uname = admin::get_name($_SESSION['admin_email']);
		echo $uname;
	   header("Location:".site_url('driver_list'));
	}
	   }else{
    header("Location:".site_url('sign_up'));
}



