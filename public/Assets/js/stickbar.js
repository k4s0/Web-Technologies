$(function(){
    var yourNavigation = $(".navbar");
    stickyDiv = "sticky";
    yourHeader = $("header").height();
    console.log(yourHeader);
    console.log(yourNavigation);
    console.log(window);
    console.log(this);
    $(window).scroll(function () {
        console.log($(this).scrollTop());
        if ($(this).scrollTop() > yourHeader) {
           // yourNavigation.removeClass("navbar-default");
            yourNavigation.addClass("sticky");
        } else {
            yourNavigation.removeClass(stickyDiv);
        }
    });
    
});
