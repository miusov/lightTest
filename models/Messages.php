<?php

class Messages
{
    public static function addMessage($name,$foto,$user_id,$message,$created_at)
    {
        $db = Db::getConnection();

        $ins = $db->prepare('INSERT INTO messages(name, foto, user_id, message, created_at) VALUES(:name, :foto, :user_id, :message, :created_at)');
        $data = array(
            'name'=>$name,
            'foto'=>$foto,
            'user_id' => $user_id,
            'message' => $message,
            'created_at' => $created_at);
        $ins->execute($data);
    }


    public static function getMessage()
    {
        $db = Db::getConnection();

        $result = $db->prepare('SELECT * FROM messages ORDER BY created_at DESC');
        $result->execute();
        $messages = $result->fetchAll(PDO::FETCH_ASSOC);

        return $messages;
    }
}