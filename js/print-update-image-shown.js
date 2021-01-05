$(document).ready(function() {
    $("input#image-chooser").change(function() {
        let f = $("input#image-chooser").val();

        /* for IE or Chrome, where C:\fakepath\... is given to obtain only the file name
         * thanks to https://stackoverflow.com/questions/2189615/how-to-get-file-name-when-user-select-a-file-via-input-type-file/2189712#2189712
         */
        f = f.replace(/.*[\/\\]/, '');

        $("img#print-image").attr("src","upload/" + f);
    });
});
