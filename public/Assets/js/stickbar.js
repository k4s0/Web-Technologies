$(function(){
    var yourNavigation = $(".navbar");
    stickyDiv = "sticky";
    yourHeader = $("header").height();
    $(window).scroll(function () {
        if ($(this).scrollTop() > yourHeader) {
           // yourNavigation.removeClass("navbar-default");
            yourNavigation.addClass("sticky");
        } else {
            yourNavigation.removeClass(stickyDiv);
        }
    });
    
});
