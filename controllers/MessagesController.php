<?php

require_once(ROOT.'/models/Messages.php');

class MessagesController
{
    public function actionIndex()
    {
        $messages = Messages::getMessage();
        
        require_once(ROOT.'/views/messages.php');
        return true;
    }

    public function actionMessage()
    {
        if (isset($_POST['send'])) {

            $name = $_SESSION['first_name'];
            $foto = $_SESSION['photo_big'];
            $user_id = $_SESSION['uid'];
            $message = $_POST['message'];
            $created_at = date("Y-m-d H:i:s");

            Messages::addMessage($name,$foto,$user_id,$message,$created_at);

            echo '<script type="text/javascript">window.location.href="messages"</script>';
        }

        return true;
    }

    public function actionComment()
    {
        if (isset($_POST['sendcomment'])) {

            $mess_id = $_POST['mess_id'];
            $name = $_SESSION['first_name'];
            $foto = $_SESSION['photo_big'];
            $user_id = $_SESSION['uid'];
            $message = $_POST['comment'];
            $created_at = date("Y-m-d H:i:s");

            Messages::addComment($mess_id,$name,$foto,$user_id,$message,$created_at);

            echo '<script type="text/javascript">window.location.href="messages"</script>';

        }

        return true;
    }

    public function actionEdit()
    {
        if (isset($_POST['editmess'])) {

            $edit = $_POST['edit'];
            $id = $_POST['id'];

            Messages::editMessage($id, $edit);

            echo '<script type="text/javascript">window.location.href="messages"</script>';

        }

        return true;
    }

}