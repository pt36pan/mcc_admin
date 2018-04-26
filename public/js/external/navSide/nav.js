$(function(){
    // nav收缩展开
    $('.nav-item>a').on('click',function(){
        if (!$('.nav').hasClass('nav-mini')) {
            if ($(this).next().css('display') == "none") {
                //展开未展开
                $('.nav-item').children('ul').slideUp(300);
                $(this).next('ul').slideDown(300);
                $(this).parent('li').addClass('nav-show').siblings('li').removeClass('nav-show');
            }else{
                //收缩已展开
                $(this).next('ul').slideUp(300);
                $('.nav-item.nav-show').removeClass('nav-show');
            }
        }
    });
    //nav-mini切换
    $('#mini').on('click',function(){
        //切换到 menu
        if (!$('.nav').hasClass('nav-mini')) {
            $('.nav-item.nav-show').removeClass('nav-show');
            $('.nav-item').children('ul').removeAttr('style');

            //收缩左侧菜单和右侧内容父级的大小
            $('.base_content_left').animate({width: '6%'});
            $('.base_content_right').animate({width: '94%'});

            $('.nav').addClass('nav-mini');

            $('.mini-logo').removeClass('hidden');
            $('.mini-logo-long').addClass('hidden')

        }else{
            //还原左侧菜单和右侧内容父级的大小
            $('.base_content_left').animate({width: '15%'});
            $('.base_content_right').animate({width: '85%'});

            $('.nav').removeClass('nav-mini');

            $('.mini-logo').addClass('hidden');
            $('.mini-logo-long').removeClass('hidden')

        }
    });
});