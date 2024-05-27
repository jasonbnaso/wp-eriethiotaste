window.$ = window.jQuery = require("jquery");

$(function () {
  $(window).on("scroll", function () {
    let logoOffset = $("#logoText").offset().top - $(window).scrollTop();
    let logoHeight = $("#logoText").outerHeight();
    let heroTitle = $("#heroTitle").offset().top - $(window).scrollTop();

    if (heroTitle <= logoOffset + logoHeight) {
      $("#heroTitle").removeClass("custom-fade-in");
      $("#heroTitle").addClass("custom-fade-out");
      $("#heroTitleHeader").addClass("custom-fade-in");
    } else {
      $("#heroTitle").removeClass("custom-fade-out");
      $("#heroTitle").addClass("custom-fade-in");
      $("#heroTitleHeader").removeClass("custom-fade-in");
    }
  });
});
$(window).on("load", function () {
  $(window)
    .on("scroll", function () {
      var windowBottom = $(this).scrollTop() + $(this).innerHeight();
      $(".fade-element").each(function () {
        var objectBottom = $(this).offset().top + $(this).outerHeight();
        if (objectBottom < windowBottom + 250) {
          if ($(this).css("opacity") == 0) {
            $(this).fadeTo(200, 1);
          }
        } else {
          if ($(this).css("opacity") == 1) {
            $(this).fadeTo(200, 0);
          }
        }
      });
    })
    .trigger("scroll");
});
