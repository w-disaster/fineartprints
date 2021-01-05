$(document).ready(function() {

    const sidebarElems = $("aside.sidebar:last-child > a");

    $("input#search-bar").keyup(function() {
        let filter, a, txtValue;
        filter = $(this).val().toUpperCase();
        for (let i = 0; i < sidebarElems.length; i++) {
            a = sidebarElems[i];
            txtValue = a.textContent || a.innerText;
    
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                sidebarElems[i].style.display = "";
            } else {
                sidebarElems[i].style.display = "none";
            }
        }
    });
});
