$(document).ready(function(){

    $("img").hover(function(){

        $(this).addClass('transition');
        //$(this).parent().parent().children(".middle").fadeTo(0, 1);

    }, function(){
        const middle = $(this).parent().parent().children(".middle");

        //middle.fadeTo(0, 0);
        if(!middle.is(":hover")){
            $(".transition").removeClass('transition');
        }
    });

    /*$(".middle").hover(function(){
        $(this).fadeTo(0, 1);
    }, function(){
        $(this).fadeTo(0, 0);
    });*/

});