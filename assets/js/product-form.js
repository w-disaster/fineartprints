const links = $("div.card-group > div.card > div.card-body > a");
const progress_bar = $("div.progress-bar");
const current_step = $("h3#current-step");
const number_states = 5;
let indx = 0;
let choice = 0;

const print_technique_messages = {
    0 : "Choose the canvas",
    1 : "Choose the paper",
    2 : "Choose the rigid support"
}

const messages = {
    0 : "Choose the printing technique",
    1 : print_technique_messages,
    2 : "Choose the frame",
    3 : "Choose the passpartout",
    4 : "Your print is complete!"
}

$(document).ready(function() {
    links.click(function(e) {
        e.preventDefault()

        // advance progress bar by one step
        indx  = updateProgressBar(indx);

        // update description and title
        if (indx != 1) {
            current_step.html(messages[indx]);
        } else {
            for ( let i = 0; i < links.length; i++) {
                if(this.isSameNode(links[i])) {
                    choice = i;
                }
            }
            current_step.html(messages[indx][choice]);
        }
        
        // TODO: update cards shown
    });
});

function updateProgressBar(indx) {
    prev = indx * 25;
    indx = (indx + 1) % number_states;
    next = indx * 25;

    progress_bar.attr("aria-valuenow", next);
    progress_bar.removeClass("w-" + prev).addClass("w-" + next);
    return indx;
}