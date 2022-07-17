<?php


class query_save
{
    public static function save($data){

        $sicaklik = "ManuelGiriş";

        try {
            $db = new PDO("mysql:host=185.210.92.220;dbname=vikos", "hesdata", "0Y0yw9g!");
            $db->query("SET CHARACTER SET utf8");



            $query = $db->prepare("INSERT INTO loglar SET chipid=:chipid,sicaklik=:sicaklik,durumu=:durumu,hes=:hes,uname=:uname,Gecerlilik_tarihi=:gecerli,TC=:tc");
            $query->execute($data);

            $query2 = $db->prepare("INSERT INTO check_flush SET status=:durumu,hes=:hes");
            $query2->execute([
                'durumu' => $data['durumu'],
                'hes' => $data['hes']
            ]);

        } catch ( PDOException $e ){
            print $e->getMessage();
        }

    }
}