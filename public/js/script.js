$(document).ready(function(){
    $('.nav-button').click(function(){
            $('.nav-button').toggleClass('change');
    });

    var width= $(window).width();
    if(width < 425){
        $(".find").on("focus", function(){
            // $('.wrapper').addClass('content-hide');
            $('.crypto-search').css({"position":"static", "padding":"30px 0px"});
            $('.main').addClass('content-hide')
        }).on("blur", function(){
            // $('.wrapper').removeClass('content-hide');
            $('.crypto-search').css({"position":"absolute", "top":"37%","padding":"0" });
            $('.main').removeClass('content-hide')
        });
    }

});































