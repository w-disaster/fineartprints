$(document).ready(function(){
    const middle = $(this).parent().parent().children(".middle");

    $("img").hover(function(){
        $(this).addClass('transition');

        middle.fadeTo(0, 1);

    }, function(){
        middle.fadeTo(0, 0);
        if(!middle.is(":hover")){
            $(".transition").removeClass('transition');
        }
    });

    $(".middle").hover(function(){
        $(this).fadeTo(0, 1);
    }, function(){
        $(this).fadeTo(0, 0);
    });

});