$(document).ready(function () {

    //--- FAQ uitklappen
    $('.faq-item .vraag').on("click", function () {
        $('.faq-item .antwoord').stop().slideUp();
        if ($(this).parent().hasClass('active')) {
            $(this).parent().find('.antwoord').stop().slideUp();
            $(this).parent().removeClass('active');
        } else {
            $('.faq-item').removeClass('active');
            $('.faq-item .antwoord').stop().slideUp();
            $(this).parent().addClass('active');
            $(this).parent().find('.antwoord').stop().slideDown();
        }
    });

});