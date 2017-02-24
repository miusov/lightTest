<?php

require_once(ROOT.'/config/api.php');
require_once ROOT.'/models/Login.php';

if (isset($_GET['code'])) {
    $result = false;
    //параметры аутентификации
    $params = array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $_GET['code'],
        'redirect_uri' => $redirect_uri
    );

    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

    if (isset($token['access_token'])) {
        $params = array(
            'uids'         => $token['user_id'],
            'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
            'access_token' => $token['access_token']
        );

        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
        if (isset($userInfo['response'][0]['uid'])) {
            $userInfo = $userInfo['response'][0];
            $result = true;
        }
    }

    if ($result) {
        
                    //если аутентификация успешная, то запоминаем пользователя
        $_SESSION['auth'] = $result;
        $_SESSION['uid'] = $userInfo['uid'];
        $_SESSION['first_name'] = $userInfo['first_name'];
        $_SESSION['last_name'] = $userInfo['last_name'];
        $_SESSION['photo_big'] = $userInfo['photo_big'];
        $_SESSION['screen_name'] = $userInfo['screen_name'];

        //проверяем на существование пользователя в БД
        if (!Login::checkUser($_SESSION['uid']))
        {   //и если такого пользователя нет, записываем в БД
            Login::setUser($_SESSION['uid'],
                $_SESSION['first_name'],
                $_SESSION['last_name'],
                $_SESSION['photo_big'],
                $_SESSION['screen_name'],
                date("Y-m-d H:i:s"));
        }

        echo '<script type="text/javascript">window.location.href="/messages"</script>';
    }
    else
    {
        echo '<script type="text/javascript">window.location.href="/"</script>';
    }
}
