<?php

if(session("admin_email")){
	$users = users::getusers();
	if(get('delete_id')){
		admin::delete_some("users",get('delete_id'));
		$success = "Kullanıcı Başarıyla Silindi.";
		header("Location:".site_url('customer_list'));
	}
	if(post('id')){
		$driver= users::find_user_byID(post('id'));
		echo  '<tr id="edit'.$driver["id"].'" >
		<td><input class="form-control form-control-user" type="text" id="uname|'.$driver['id'].'" value="'.$driver["uname"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="email|'.$driver['id'].'" value="'.$driver["email"].'"></td>
		<td><input class="form-control form-control-user" type="text" id="telno|'.$driver['id'].'" value="'.$driver["telno"].'"></td>
											<td><a class="dropdown-item text-center"  href="" onclick="editU('.$driver['id'].')" id="edit" >KAYDET</a></td>
                                        </tr>';
		exit();
	}
	if(post('save_edit')){
		
		$data = [
			'id' =>  post('save_edit'),
			'uname' =>  post('uname'),
			'email' =>  post('email'),
			'telno' =>  post('telno')
		];
		users::editUserFromID($data);
		exit();
	}
	if(post('add_id')){
		admin::add_device_byUser(post('add_id'),post('device_id'));
		exit();
	}
		$devices = admin::get_drivers();
	$uname = admin::get_name($_SESSION['admin_email']);
	require view('customer_list');
}else{	
	header("Location:".site_url('sign_up'));
}