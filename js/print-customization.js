$(document).ready(function() {

    const technique = $("button#technique-choice");
    const frame = $("button#frame-choice");
    const passpartout = $("button#passpartout-choice");

    $("div.accordion > div > button").click(function() {
        let img = $(this).find("img");
        let data;
        let id  = img.next().children().first();
        let description = id.next();
        let choice = $(this).parent().prev();

        if (img.length > 0) {
            data = `
            <span class="media justify-content-center">
                <img class="mr-3" src="${img.attr("src")}" alt="
               ${id.html()}">
                <span class="media-body">
                    <span class="h5 d-block">${id.html()}</span>
                    <span class="h6 d-block">${description.html()}</span>
                </span>
            </span>`;
        } else {
            data =`<span>none</span>`;
        }

        if (choice.is("button#technique-choice")) {
            technique.children().remove();
            technique.append(data);
            technique.find("img").attr("width", "50%");
            console.log(technique.text().trim());
        } else if (choice.is("button#frame-choice")) {
            frame.children().remove();
            frame.append(data);
        } else if (choice.is("button#passpartout-choice")) {
            passpartout.children().remove();
            passpartout.append(data);
        }
    });
}); 