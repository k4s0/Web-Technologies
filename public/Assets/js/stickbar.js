$(function(){
    var yourNavigation = $(".navbar");
    stickyDiv = "sticky";
    yourHeader = $("header").height()+250;
    $(window).scroll(function () {
        console.log($(document).height());
        if ($(this).scrollTop() > yourHeader) {
            yourNavigation.addClass("sticky");
        } else {
            yourNavigation.removeClass(stickyDiv);
        }
    });

});
