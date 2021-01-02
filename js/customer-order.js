$(document).ready(function() {

    $("#btn").click(function() {
        $("#ship_option").refresh(true);
   }); 

   if ($("#notifnumber").val() == 0) {
       $("#data-toggle").hide();
       $("#clear").hide();
   } else {
        $("#data-toggle").show();
        $("#clear").show();
   }

});