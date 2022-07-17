<?php
if(post('date')) {
	$cur_date = date_create(post('date'));
	$date = date_format($cur_date,"Y-m-d");
	$drivers = admin::getlogBydate($date,post('user_id'))[0];
	$html = "";
	if(empty($drivers)){
	    echo '<h1 style="font-weight:bold">Bu tarihe ait geçiş bilgileri bulunmamaktadır.</h1>';
	    exit();
	}else{
	    foreach($drivers as $driver){
	    	if($driver["uname"]=="")
					{$driver["uname"]="****** *****";}
		$html .= '<tr id="edit'.$driver["id"].'">
                                            <td>'.$driver["chipid"].'</td>
                                            <td>'.$driver["hes"].'</td>
                                            <td>'.$driver["durumu"].'</td>
                                            <td>'.$driver["sicaklik"].'</td>
											<td>'.$driver["tarih"].'</td>
											<td>'.$driver["uname"].'</td>
                                      	</tr>';
	}
	
	echo $html;
	exit();
	    
	}
	
}
if(post('getAdminLog')){
		//echo "qasda";
		
		$cihazlar = admin::get_deviceForUser(post('user_id'))['cihazlari'];
		$drivers = admin::get_driverslog();
		$cihazlari = explode("/", $cihazlar);
		$i=0;
	$html = "";
	$value = Array();
		foreach($drivers as $driver){
		    	if($driver["uname"]=="")
					{$driver["uname"]="****** *****";}
				if (in_array($driver['chipid'], $cihazlari)) {
					$data = [
						'id' =>  $driver['id'],
						'chipid'=> $driver['chipid'] ,
						'hes' =>  $driver['hes'],
						'sicaklik' =>  $driver['sicaklik'],
						'tarih' =>  $driver['tarih']
					];
					$html .= '<tr id="edit'.$driver["id"].'">
                                            <td>'.$driver["chipid"].'</td>
                                            <td>'.$driver["hes"].'</td>
                                              <td>'.$driver["durumu"].'</td>
                                            <td>'.$driver["sicaklik"].'</td>
											<td>'.$driver["tarih"].'</td>
												<td>'.$driver["uname"].'</td>
                                      	</tr>';
						array_push($value,$data);
					$i++;
				}
			}
	//$value = json_encode($value);
	$value = json_encode($value, JSON_PRETTY_PRINT);
		print_r($html);
		exit();
}
if(post('getDevice')){
		//echo "qasda";
		
		$cihazlar = admin::get_deviceForUser(post('user_id'))['cihazlari'];
		$drivers = admin::get_driverslog();
		$cihazlari = explode("/", $cihazlar);
		$i=0;
	$html = "";
	$value = Array();
		foreach($drivers as $driver){
				if (in_array($driver['chipid'], $cihazlari)) {
					$data = [
						'id' =>  $driver['id'],
						'chipid'=> $driver['chipid'] ,
						'hes' =>  $driver['hes'],
							'durumu' =>  $driver['durumu'],
						'sicaklik' =>  $driver['sicaklik'],
						'tarih' =>  $driver['tarih'],
						'uname' => $driver['uname']
					];
					if($driver["uname"]=="")
					{$driver["uname"]="****** *****";}
					$html .= '<tr id="edit'.$driver["id"].'">
                                            <td>'.$driver["chipid"].'</td>
                                            <td>'.$driver["hes"].'</td>
                                            <td>'.$driver["durumu"].'</td>
                                            <td>'.$driver["sicaklik"].'</td>
											<td>'.$driver["tarih"].'</td>
											<td>'.$driver["uname"].'</td>
                                      	</tr>';
						array_push($value,$data);
					$i++;
				}
			}
	//$value = json_encode($value);
	$value = json_encode($value, JSON_PRETTY_PRINT);
		print_r($html);
		exit();
}
if(session('admin_email')){
	$drivers = admin::get_driverslog();
	if(get('delete_id')){
		admin::delete_some("drivers",get('delete_id'));
		$success = "Taksi Başarıyla Silindi.";
		header("Location:".site_url('logs'));
	}
	if(post('id')){
		$driver= drivers::get_driver_info(post('id'));
		echo  '<tr id="edit'.$driver["id"].'" >
		<td><input class="form-control form-control-user" type="text" id="uname|'.$driver['id'].'" value="'.$driver["chipid"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="telno|'.$driver['id'].'" value="'.$driver["ssid"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="email|'.$driver['id'].'" value="'.$driver["sinyal"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="plate|'.$driver['id'].'" value="'.$driver["ses"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="marka|'.$driver['id'].'" value="'.$driver["guncel"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="model|'.$driver['id'].'" value="'.$driver["ilk_gorulme"].'"></td>
				<td><input class="form-control form-control-user" type="text" id="model|'.$driver['id'].'" value="'.$driver["son_gorulme"].'"></td>
						<td><input class="form-control form-control-user" type="text" id="model|'.$driver['id'].'" value="'.$driver["bekleyen_islem"].'"></td>
											<td><a class="dropdown-item text-center" href="" onclick="edit('.$driver['id'].')" id="edit" >KAYDET</a></td>
                                        </tr>';
		exit();
	}
	if(post('save_edit')){
		
		$data = [
			'id' =>  post('save_edit'),
			'uname' =>  post('uname'),
			'email' =>  post('email'),
			'telno' =>  post('telno'),
			'plate' =>  post('plate'),
			'marka' =>  post('marka'),
			'model' =>  post('model'),
		];
		drivers::editDriverAllInfo($data);
		exit();
	}
	
	$cihazlar = admin::get_deviceForUser(session("id"))['cihazlari'];
	$cihazlari = explode("/", $cihazlar);
	$uname = admin::get_name($_SESSION['admin_email']);
	require view('logs');
}else{
	header("Location:".site_url('sign_up'));
}