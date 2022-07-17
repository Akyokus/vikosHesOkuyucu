<?php

if (!session("admin_email")){
    if (post('login')){
        $email = post('email');
        $password = post('password');

//to do:eğer facebook ile giriş yapıldıysa
        if (!$email) {
            $error = 'Lütfen email adresinizi giriniz.';
        } else if (!$password) {
            $error = 'Lütfen şifrenizi giriniz.';
        } else {

            //üye var mı

            $row = users::userExist($email);
            if ($row) {
                //parola kontrolü
                $entered_pass = md5($password);

                if ($entered_pass === $row['password']) {

                    $success = 'Başarıyla giriş yaptınız. Yönlendiriliyorsunuz...';
					$_SESSION['id'] = $row['id'];
               		$_SESSION['yetki'] = $row['yetki'];
					$_SESSION['admin_email']=$row['email'];
                   header('Refresh:1;url=' . site_url('index'));
                    
                } else {
                    $error = 'Hatalı bir şifre girdiniz. Lütfen tekrar deneyiniz.';
                
                }

            } else {
                $error = 'Böyle bir email ile kayıtlı üye bulunmamaktadır.';
            }
        }
    }
	 require view('login');
	
}else{
	
    header('Refresh:1;url=' . site_url('index'));
}
