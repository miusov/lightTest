(function($) {
    $(function() {

        $('.comment_message').click(function() {
            if($(this).next().css('display') != 'block'){
                $(this).next().slideDown(500);
            }
            else{
                $(this).next().slideUp(500);
            }
        });






    })
})(jQuery)