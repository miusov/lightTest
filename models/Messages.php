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

        $result = $db->prepare('SELECT * FROM messages WHERE mess_id=0 ORDER BY created_at DESC');
        $result->execute();
        $messages = $result->fetchAll(PDO::FETCH_ASSOC);

        return $messages;
    }
    

    public static function addComment($mess_id,$name,$foto,$user_id,$message,$created_at)
    {
        $db = Db::getConnection();

        $ins = $db->prepare('INSERT INTO messages(mess_id, name, foto, user_id, message, created_at) VALUES(:mess_id, :name, :foto, :user_id, :message, :created_at)');
        $data = array(
            'mess_id'=>$mess_id,
            'name'=>$name,
            'foto'=>$foto,
            'user_id' => $user_id,
            'message' => $message,
            'created_at' => $created_at);
        $ins->execute($data);
    }

    public static function getComment($mess_id)
    {
        $db = Db::getConnection();

        $result = $db->prepare('SELECT * FROM messages WHERE mess_id='.$mess_id);
        $result->execute();
        $comments = $result->fetchAll(PDO::FETCH_ASSOC);

        return $comments;
    }

    public static function editMessage($id, $edit)
    {
        $db = Db::getConnection();

        $ins = $db->prepare('UPDATE messages SET message="'.$edit.'" WHERE id='.$id);
        $data = array(
            'message' => $edit);
        $ins->execute($data);
    }

}