<?php


class users
{
    public static function login($data){

        $_SESSION['user_id'] = $data['id'];
        $_SESSION['user_name'] = self::find_user($data['email'])['uname'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['time_stamp'] = time();
    }
    public static function find_user($email){
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE email=:email');
        $query->execute([
            'email' => $email
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public static function find_user_byID($id){
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE id=:id');
        $query->execute([
            'id' => $id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
	

    public static function userExist($email){
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE email=:email');
        $query->execute([
            'email' => $email
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);

        if ($row == ''){
            return false;
        }else{
            return $row;
        }
    }
	    public static function getUsers(){
        global $db;
        $query = $db->prepare('SELECT * FROM users');
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }
    public static function register($data){
        global $db;
        $query = $db->prepare('INSERT INTO users SET uname =:uname,email =:email,password=:password,telno=:telno');
        $row = $query->execute($data);
        if ($row){
            return true;
        }else{
            return false;
        }
    }
    public static function newpassword($newpassword){
        global $db;
        $query = $db->prepare('UPDATE users SET password=:password WHERE email=:email');
        return $query->execute([
            'password' => $newpassword,
            'email' => session('email')
        ]);

    }
    public static function editUser($data){
        global $db;
        $query = $db->prepare('UPDATE users SET uname=:uname,telno=:telno WHERE email=:email');
        return $query->execute($data);

    }
	public static function editUserFromID($data){
        global $db;
        $query = $db->prepare('UPDATE users SET uname=:uname,email=:email,telno=:telno WHERE id=:id');
        return $query->execute($data);

    }

}
