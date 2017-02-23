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
                            <form action="/comment/" method="post">
                                <textarea name="comment" id="sub_comment"></textarea>
                                <input type="hidden" value="<?php echo $mess['id'] ?>" name="mess_id">
                                <input class="sendbtn" type="submit" name="sendcomment" value="Комментировать">
                            </form>
                        </div>
                        <?php }else{echo '<a href="/">Для комментирования сообщений выполните вход!</a>';} ?>
                        <?php foreach ($comments as $comm){ ?>
                        <div class="comments">
                            <div class="col-md-2 col-md-offset-1 text-center user_info">
                                <img src="<?php echo $comm['foto'] ?>" alt="" width="65" height="65">
                                <?php echo $comm['name'] ?>
                            </div>
                            <div class="col-md-9 comment_block">
                                <?php echo $comm['message'] ?>
                                <div class="date_block text-right"><?php echo $comm['created_at'] ?></div>
                            </div>

                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
