<?php

class Login
{
    public static function setUser($uid,$name,$surname,$foto,$link,$date)
    {
        $db = Db::getConnection();

        $ins = $db->prepare('INSERT INTO users(uid,first_name, last_name, photo_big, screen_name, created_at) VALUES(:uid, :name, :surname, :foto, :link, :date)');
        $data = array(
            'uid'=>$uid,
            'name' => $name,
            'surname' => $surname,
            'foto' => $foto,
            'link' => $link,
            'date' => $date);
        $ins->execute($data);
    }

    public static function checkUser($uid)
    {
        $db = Db::getConnection();

        $result = $db->prepare('SELECT * FROM users WHERE uid='.$uid);
        $result->execute();
        $user = $result->fetch(PDO::FETCH_ASSOC);

        return $user['uid'];

    }
}