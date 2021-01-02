function getPics(datapics) {
    let pics = "";
    for(let i=0; i < datapics.length; i++){
        let pic = "";
        if (i == 0) {
            pic = `
        <div class="carousel-item active">
            <img class="d-block w-100" src="${datapics[i]["Image"]}" alt="">
        </div>
        `;
        } else {
            pic = `
        <div class="carousel-item">
            <img class="d-block w-100" src="${datapics[i]["Image"]}" alt="">
        </div>
        `;
        }
        pics += pic;
    }
    return pics;
}

$(document).ready(function() {
    $.getJSON("api-slideshow.php", function(data){
        const pics = getPics(data);
            $("#carousel").append(pics); 
    });
});