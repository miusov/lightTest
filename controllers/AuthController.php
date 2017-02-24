<?php

class AuthController
{
    public function actionIndex()
    {
        require_once(ROOT.'/views/index.php');
        return true;
    }

    public function actionLogin()
    {
        require_once(ROOT.'/models/auth/auth.php');
        return true;
    }


    public function actionLogout()
    {
        unset($_SESSION['first_name']);
        unset($_SESSION["last_name"]);
        unset($_SESSION['photo_big']);
        unset($_SESSION["screen_name"]);
        unset($_SESSION['uid']);
        unset($_SESSION['auth']);

        echo '<script type="text/javascript">window.location.href="/"</script>';

        return true;
    }
}