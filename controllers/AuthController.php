<?php

class AuthController
{
    public function actionIndex()
    {
        require_once(ROOT.'/views/auth.php');
        return true;
    }
}