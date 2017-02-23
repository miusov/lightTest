<?php
require_once ROOT.'/models/Login.php';

if (isset($_SESSION['auth']))
{
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-right header">
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
            <form action="/send/" method="post">
                <textarea name="message"></textarea><br>
                <?php if (isset($_SESSION['auth'])){ ?>
                <input class="sendbtn" type="submit" name="send" value="Отправить">
                <?php }else{echo '<a href="/">Для добавления и комментирования сообщений выполните вход!</a>';} ?>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <?php foreach ($messages as $mess){ ?>
                <div class="block">
                    <div class="col-md-2 user_info text-center">
                        <img src="<?php echo $mess['foto'] ?>" alt="" width="85" height="85">
                        <?php echo $mess['name'] ?>
                    </div>
                    <div class="col-md-10 message_block">
                        <?php echo $mess['message'] ?>
                        <div class="date_block text-right"><?php echo $mess['created_at'] ?></div>
                        <?php if (isset($_SESSION['auth'])){ ?>
                        <div class="comment_message">
                            Комментировать сообщение
                        </div>
                        <div class="hidden_form">
                            <form action="">
                                <textarea name="sub_comment" id="sub_comment"></textarea>
                                <input class="sendbtn" type="submit" name="send_hidden_form" value="Комментировать">
                            </form>
                        </div>
                        <?php }else{echo '<a href="/">Для комментирования сообщений выполните вход!</a>';} ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
