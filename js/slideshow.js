function getPic(pics,i) {
    let slideshowpic = `<img id="img" class="img-fluid" src="${pics[i]["Image"]}" alt=""/>`;
    console.log(slideshowpic);
    return slideshowpic;
}

$(document).ready(function() {
    let i = 0;
    $.getJSON("api-slideshow.php", function(data){
        const pic = getPic(data,0);
        $("#div-img").append(pic);
    });

    $("#right").click(function(){
        $("img").remove();
        $.getJSON("api-slideshow.php", function(data){
            if(i == data.length -1) {
                i = 0;
            }
            const pic = getPic(data,++i);
            $("#div-img").append(pic);
        });
    });

    $("#left").click(function(){
        $("img").remove();
        $.getJSON("api-slideshow.php", function(data){
            if(i == 0) {
                i = data.length -1;
            }
            const pic = getPic(data,--i);
            $("#div-img").append(pic);
        });
    });
});