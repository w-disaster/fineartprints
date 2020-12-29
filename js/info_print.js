const aside = document.querySelector("aside");
let info = "";

$(document).ready(function(){

    $("img").hover(function(){
        $(this).addClass('transition');
        let title = $(this).parent().parent().children('h6').text();

        title = title.replaceAll(" ", "%");

        $.getJSON("api-print.php?title=" + title, function(data){
            info = `<section class="bg-white border my-4 px-5 py-3">
                <h2>` + data["Title"] + `</h2>
                <ul class="nav flex-column align-text-left">
                    <li class="p-2"> <h5>Description</h5>` +  data["Description"] + `</li>
                    <li class="p-2"> <h5>Category</h5>` + data["Category_name"] + `</li>
                    <li class="p-2"> <h5>Author</h5>` + data["Author"] + `</li>
                    <li class="p-2"> <h5>Publish date</h5>` + data["Publish_date"] + `</li>
                </ul>
            </section>`;
            aside.innerHTML += info;
        });

        //$(this).fadeTo("fast", 0.5);
        
    }, function(){
        $(this).removeClass('transition');
        //$(this).fadeTo(0, 1);
        aside.innerHTML = aside.innerHTML.replace(info, "");
        info = "";
    });
});