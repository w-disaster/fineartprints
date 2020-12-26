$(document).ready(function () {
  $("button.sidebar-opener").click(function () {
    $("div.sidebar").css("display", "block");
  });

  $("button.sidebar-closer").click(function () {
    $("div.sidebar").css("display", "none");
  });
});