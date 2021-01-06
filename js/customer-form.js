$(document).ready(function(){
    
    $("#edit").click(function() {
        $("#personal_fieldset").prop("disabled",false);
        $("#edit").hide();
        $("#save").removeClass("d-none");
        $("#cancel").removeClass("d-none");
        $("#form-old-password").removeClass("d-none");
        $("#form-new-password").removeClass("d-none");
        $("#form-confirm-password").removeClass("d-none");
   }); 

   $("#cancel").click(function() {
        location.reload();
    }); 

    $("personal-form").submit(function() {
        $("#edit").show();
        $("#save").addClass("d-none");
        $("#cancel").addClass("d-none");
        $("#form-old-password").addClass("d-none");
        $("#form-new-password").addClass("d-none");
        $("#form-confirm-password").addClass("d-none");
    }); 
});