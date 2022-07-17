<?php

class admin
{
    public static function login($data){
global $db;
        $_SESSION['admin_email'] = $data['admin_email'];
    }
	public static function get_drivers(){
		global $db;

        $query = $db->prepare('SELECT * FROM cihaz ');

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function get_emailUser(){
        global $db;
        $query = $db->prepare("SELECT * FROM users WHERE email=:email");
        $query->execute([
            'email' => session('admin_email')
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
	public static function get_logs(){
        $cihazlar = self::get_emailUser()['cihazlari'];
        global $db;
        $query = $db->prepare("SELECT * FROM loglar WHERE chipid=:chipid ORDER BY tarih DESC");
        $query->execute([
            'chipid' => $cihazlar
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }
		public static function get_driverslog(){
		global $db;

        $query = $db->prepare('SELECT * FROM loglar ORDER BY tarih DESC');

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public static function update_device($data){
		global $db;
		$query = $db->prepare('UPDATE cihaz SET ssid=:ssid,sinyal=:sinyal,ses=:ses,guncel=:guncel,ilk_gorulme=:ilk_gorulme,son_gorulme=:son_gorulme,bekleyen_islem=:bekleyen_islem WHERE chipid=:chipid');
		$query->execute($data);
		
	}
	public static function get_users(){
		global $db;
        $query = $db->prepare('SELECT * FROM users');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public static function get_device($id){
		global $db;
        $query = $db->prepare('SELECT * FROM cihaz WHERE chipid=:chipid');
        $query->execute([
			'chipid' => $id
		]);
        return $query->fetch(PDO::FETCH_ASSOC);
		
	}
	public static function delete_some($table,$id){
		global $db;
		$query = $db->prepare('DELETE FROM '.$table.' WHERE id=:id');
		$query->execute([
			'id' => $id
		]);
		
	}
	public static function add_device_byUser($user_id,$device_id){
		global $db;
        $query = $db->prepare('SELECT cihazlari FROM users WHERE id=:id');
        $query->execute([
			'id' => $user_id
		]);
        $cihazlar = $query->fetch(PDO::FETCH_ASSOC);
		$cihazlar = $cihazlar['cihazlari']."/".$device_id;
		$query1 = $db->prepare("UPDATE users SET cihazlari=:cihazlari WHERE id=:id");
		$res = $query1->execute([
			'cihazlari' => $cihazlar,
			'id' => $user_id
		]);
		echo $res;
	}
	public static function get_deviceForUser($id){
		global $db;
        $query = $db->prepare('SELECT * FROM users WHERE id=:id');
        $query->execute([
			'id' => $id
		]);
        return $query->fetch(PDO::FETCH_ASSOC);
		
	}
	public static function getlogBydate($date,$user_id){
		//$logs = self::get_driverslog();
		$devices = self::get_deviceForUser($user_id)['cihazlari'];
		$device = explode("/",$devices);
		$logs = [];
		//$date = date_create($date);
	//	print_r($date);
	$sorgu="SELECT * FROM loglar WHERE chipid=:chipid AND tarih LIKE '".$date."%'";

		foreach($device as $devi){
		    
		    global $db;
		    
		$query = $db->prepare($sorgu);
		$query->execute([
		        'chipid' => $devi
		        
		    ]);
		    $row = $query -> fetchAll();
		    array_push($logs,$row);
		}
		
	return $logs;
	//	$date_array = Array();
	//	foreach($logs as $log){
			
	//		$temp_date = explode(" ",$log['tarih'])[0];
	//		if($temp_date == $date && in_array($log['chipid'], $device)){
	//			array_push($date_array,$log);
	//		}
//		}
	//	return $date_array;
		//return $date_array;
		
	}
	public static function get_name($email){
		global $db;
		$query = $db->prepare("SELECT uname FROM users WHERE email=:email");
		$query->execute([
			'email' => $email
		]);
		$row = $query->fetch();
		return $row['uname'];
	}
	
}