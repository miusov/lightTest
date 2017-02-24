<?php
require_once ROOT.'/models/Login.php';

if (isset($_SESSION['auth'])) { //проверяем аутентификацию
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-right header">
            <a href="<?php echo 'https://vk.com/'.$_SESSION['screen_name'] ?>" target="_blank">
            <img src="<?php echo $_SESSION['photo_big'] ?>" alt="" width="65" height="65">
            <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'] ?></a>
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
                <?php }else{echo '<div  class="text-right"><a href="/">Для добавления и комментирования сообщений выполните вход!</a></div>';} ?>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="hidden_mess">
                <span>Скрыть все сообщения | </span>
            </div>
            <div class="view_comm">
                <span>Показать все комментарии</span>
            </div>
        </div>
    </div>
    
    <div class="row all">
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
                        <hr>
                        <?php if (isset($_SESSION['auth'])){ ?>
                            <div class="comment_view">
                                <span>Показать комментарии | </span>
                            </div>
                        <div class="comment_message">
                            <span>Комментировать сообщение | </span>
                        </div>
                            <?php if ($mess['user_id']==$_SESSION['uid']){ ?>
                                <div class="edit_message">
                                    <span>Редактировать</span>
                                </div>
                                <div class="hidden_form_edit">
                                    <form action="/edit/" method="post">
                                        <textarea name="edit" placeholder="Введите новое сообщение"></textarea>
                                        <input type="hidden" value="<?php echo $mess['id'] ?>" name="id">
                                        <input class="sendbtn" type="submit" name="editmess" value="Изменить">
                                    </form>
                                </div>
                        <?php } ?>
                        <div class="hidden_form">
                            <form action="/comment/" method="post">
                                <textarea name="comment" id="sub_comment"></textarea>
                                <input type="hidden" value="<?php echo $mess['id'] ?>" name="mess_id">
                                <input class="sendbtn" type="submit" name="sendcomment" value="Комментировать">
                            </form>
                        </div>
                        <?php }else{echo '<a href="/">Для комментирования сообщений выполните вход!</a>';} ?>
                        <?php $comments = Messages::getComment($mess['id']);
                        foreach ($comments as $comm){
                            ?>
                        <div class="comments">
                            <div class="col-md-2 text-center user_info">
                                <img src="<?php echo $comm['foto'] ?>" alt="" width="65" height="65">
                                <?php echo $comm['name'] ?>
                            </div>
                            <div class="col-md-10 comment_block">
                                <?php echo $comm['message'] ?>
                                <div class="date_block text-right"><?php echo $comm['created_at'] ?></div>
                                <hr>
                                <?php if (isset($_SESSION['uid'])){ ?>
                                <div class="comment_submessage">
                                    <span>Комментировать</span>
                                </div>
                                <div class="hidden_form2">
                                    <form action="/comment/" method="post">
                                        <textarea name="comment" id="sub_comment"></textarea>
                                        <input type="hidden" value="<?php echo $comm['id'] ?>" name="mess_id">
                                        <input class="sendbtn" type="submit" name="sendcomment" value="Комментировать">
                                    </form>
                                </div><br>

                                    <?php $comments = Messages::getComment($comm['id']);
                                    foreach ($comments as $comm){ ?>

                                        <div class="subcomments">
                                            <div class="col-md-2 text-center user_info">
                                                <img src="<?php echo $comm['foto'] ?>" alt="" width="65" height="65">
                                                <?php echo $comm['name'] ?>
                                            </div>
                                            <div class="col-md-10 comment_block">
                                                <?php echo $comm['message'] ?>
                                                <div class="date_block text-right"><?php echo $comm['created_at'] ?></div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                <?php }else{echo '<a href="/">Для комментирования сообщений выполните вход!</a>';} ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
