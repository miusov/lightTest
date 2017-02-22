<?php
require_once ROOT.'/models/Login.php';

if (isset($_SESSION['auth']))
{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-right">
            <img src="<?php echo $_SESSION['photo_big'] ?>" alt="" width="65" height="65">
            <a href="<?php echo 'https://vk.com/'.$_SESSION['screen_name'] ?>" target="_blank"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'] ?></a>
            <a href="exit" class="exit">Выход</a>
        </div>
    </div>
</div>
    <?php } ?>
    <br>
<div class="container message">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form action="">
                <textarea name="message"></textarea><br>
                <?php if (isset($_SESSION['auth'])){ ?>
                <input class="sendbtn" type="submit" name="send" value="Отправить">
                <?php }else{echo '<a href="/">Для отправки сообщений необходимо авторизироваться</a>';} ?>
            </form>
        </div>
    </div>
</div>