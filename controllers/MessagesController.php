<?php

class MessagesController
{
    public function actionIndex()
    {
        require_once(ROOT.'/views/messages.php');
        return true;
    }
}