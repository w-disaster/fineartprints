const replaceArea = document.querySelector("aside > .replace-area");
let info = "";

$(document).ready(function(){
    $("img").hover(function(){
        $(this).addClass('transition');
        let title = $(this).parent().parent().children('h6').text();

        $.getJSON("api-print.php?title=" + title, function(data){
            info = `<section class="img-info bg-white border my-4 px-5 py-3">
                    <h2>` + data["Title"] + `</h2>
                    <ul class="nav flex-column align-text-left">
                        <li class="p-2"> <h5>Description</h5>` +  data["Description"] + `</li>
                        <li class="p-2"> <h5>Category</h5>` + data["Category_name"] + `</li>
                        <li class="p-2"> <h5>Author</h5>` + data["Author"] + `</li>
                        <li class="p-2"> <h5>Publish date</h5>` + data["Publish_date"] + `</li>
                    </ul>
                </section>`;
            replaceArea.innerHTML= info;
        });
        
    }, function(){
        $(this).removeClass('transition');
        replaceArea.innerHTML = "";
    });
});