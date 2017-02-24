(function($) {
    $(function() {

        $('.comment_message').click(function() {
            if($(this).next().next().next().css('display') != 'block'){
                $(this).next().next().next().slideDown(500);
                $(this).children('span').text('Отмена | ');
            }
            else{
                $(this).next().next().next().slideUp(500);
                $(this).children('span').text('Комментировать сообщение | ');
            }
        });

        $('.edit_message').click(function() {
            if($(this).next().css('display') != 'block'){
                $(this).next().slideDown(500);
                $(this).children('span').text('Отмена');
            }
            else{
                $(this).next().slideUp(500);
                $(this).children('span').text('Редактировать');
            }
        });

        $('.comment_view').click(function() {
            if($(this).next().next().nextAll('.comments').css('display') != 'block'){
                $(this).next().next().nextAll('.comments').slideDown(500);
                $(this).children('span').text('Скрыть комментарии | ');
            }
            else{
                $(this).next().next().nextAll('.comments').slideUp(500);
                $(this).children('span').text('Показать комментарии | ');
            }
        });

        $('.hidden_mess').click(function() {
            if($('.all').css('display') == 'block'){
                $('.all').slideUp(500);
                $(this).children('span').text('Показать все сообщения | ');
            }
            else{
                $('.all').slideDown(500);
                $(this).children('span').text('Скрыть все сообщения | ');
            }
        });

        $('.view_comm').click(function() {
            if($('.comments').css('display') != 'block'){
                $('.comments').slideDown(500);
                $(this).children('span').text('Скрыть все комментарии');
            }
            else{
                $('.comments').slideUp(500);
                $(this).children('span').text('Показать все комментарии');
            }
        });

            $('.comment_submessage').click(function() {
                if($(this).next().css('display') != 'block'){
                    $(this).next().slideDown(500);
                    $(this).children('span').text('Отмена');
                }
                else{
                    $(this).next().slideUp(500);
                    $(this).children('span').text('Комментировать');
                }
        });




    })
})(jQuery)