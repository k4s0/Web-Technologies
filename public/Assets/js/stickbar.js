$(function(){
    var yourNavigation = $(".navbar");
    stickyDiv = "sticky";
    yourHeader = $("header").height();
    $(window).scroll(function () {
        console.log($(this).scrollTop());
        if ($(this).scrollTop() > yourHeader) {
            yourNavigation.addClass("sticky");
        } else {
            yourNavigation.removeClass(stickyDiv);
        }
    });

});
