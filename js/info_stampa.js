const aside = document.querySelector("aside");
const info = `<section class="bg-white border mt-4 px-5 py-3">
        <h2>Descrizione stampa</h2>
        <ul class="nav flex-column">
            <li>Autore</li>
            <li>Descrizione stampa artistica</li>
            <li>Costo</li>
        </ul>
    </section>`;

$(document).ready(function(){
    $("img").hover(function(){
        $(this).addClass('transition');

        //$(this).fadeTo("fast", 0.5);
        aside.innerHTML += info;
    }, function(){
        $(this).removeClass('transition');

        //$(this).fadeTo(0, 1);
        aside.innerHTML = aside.innerHTML.replace(info, "");
    });
});