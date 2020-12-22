$(document).ready(function () {
  $("button.sidebar-opener").click(function () {

    $("div.sidebar").removeClass("d-none");
    $("div.sidebar").css("display", "block");
    $("button.sidebar-opener").hide();

    if ($(window).width() > 992) {
      $("div.sidebar").css("width", "25%");
      $("footer").css("marginLeft", "25%");
      $("main").css("marginLeft", "25%");
      $("nav").css("marginLeft", "25%");
    }

  });

  $("button.sidebar-closer").click(function () {
    $("div.sidebar").addClass("d-none");

    $("main").css("marginLeft", "0%");
    $("footer").css("marginLeft", "0%");
    $("nav").css("marginLeft", "0%");

    $("button.sidebar-opener").css("display", "inline-block");
  });
});