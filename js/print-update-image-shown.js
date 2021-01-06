$(document).ready(function() {
    $("input#picture").change(function() {
        readURL(this);
    });

    /* used to preview an image before it is uploaded
    * thanks to https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $("img#print-image").attr("src", e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
});
