<?php
//if($_SESSION['admin_email']){
if(post('getDevice')){
		//echo "qasda";
		
		$cihazlar = admin::get_deviceForUser(post('user_id'))['cihazlari'];
		$drivers = admin::get_drivers();
		$cihazlari = explode("/", $cihazlar);
		$i=0;
	$html = "";
	$value = Array();
		foreach($drivers as $driver){
				if (in_array($driver['chipid'], $cihazlari)) {
					if($driver['bekleyen_islem'] == 0){
						$driver['bekleyen_islem'] = "Yok";	
					}else{
						$driver['bekleyen_islem'] = "Var";	
					}
					$html .= '<tr id="edit'.$driver['chipid'].'">
                                            <td>'.$driver['chipid'].'</td>
                                            <td>'.$driver['ssid'].'</td>
                                            <td>'.$driver['sinyal'].'</td>
											<td>'.$driver['ses'].'</td>
                                            <td>'.$driver['guncel'].'</td>
											<td>'.$driver['ilk_gorulme'].'</td>
											<td>'.$driver['son_gorulme'].'</td>
                                            <td>'.$driver['bekleyen_islem'].'</td>
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
	$drivers = admin::get_drivers();
	if(get('delete_id')){
		admin::delete_some("drivers",get('delete_id'));
		$success = "Taksi Başarıyla Silindi.";
		header("Location:".site_url('driver_list'));
	}
	if(post('id')){
		$driver= admin::get_device(post('id'));
		echo  '<tr id="edit'.$driver["chipid"].'" >
		<td><input class="form-control form-control-user" type="text" id="chipid|'.$driver['chipid'].'" value="'.$driver["chipid"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="ssid|'.$driver['chipid'].'" value="'.$driver["ssid"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="sinyal|'.$driver['chipid'].'" value="'.$driver["sinyal"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="ses|'.$driver['chipid'].'" value="'.$driver["ses"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="guncel|'.$driver['chipid'].'" value="'.$driver["guncel"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="ilk_gorulme|'.$driver['chipid'].'" value="'.$driver["ilk_gorulme"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="son_gorulme|'.$driver['chipid'].'" value="'.$driver["son_gorulme"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="bekleyen_islem|'.$driver['chipid'].'" value="'.$driver["bekleyen_islem"].'"></td>
											<td><a class="dropdown-item text-center" href="" onclick="edit('.$driver['chipid'].')" id="edit" >KAYDET</a></td>
                                        </tr>';
		exit();
	}
	if(post('chipid')){
		
		$data = [
			'chipid' =>  post('chipid'),
			'ssid' =>  post('ssid'),
			'sinyal' =>  post('sinyal'),
			'ses' =>  post('ses'),
			'guncel' =>  post('guncel'),
			'ilk_gorulme' =>  post('ilk_gorulme'),
			'son_gorulme' =>  post('son_gorulme'),
			'bekleyen_islem' =>  post('bekleyen_islem')
		];
		admin::update_device($data);
	}
if(post('getDevice')){
		//echo "qasda";
		$cihazlar = admin::get_deviceForUser(post('user_id'))['cihazlari'];
		$drivers = admin::get_drivers();
		$cihazlari = explode("/", $cihazlar);
		foreach($drivers as $driver){
				if (in_array($driver['chipid'], $cihazlari)) {
					
				}
			}
		exit();	
}
		
		$devices = admin::get_drivers();
		$cihazlar = admin::get_deviceForUser($_SESSION['id'])['cihazlari'];
	$uname = admin::get_name($_SESSION['admin_email']);
	require view('driver_list');
}else{
	header("Location:".site_url('sign_up'));
}
